# Initialize the database by creating necessary tables, inserting data...
# To run this python script, you need to install
# - sqlalchemy
# - pymysql
# pip install sqlalchemy pymysql

import csv
import os

import sqlalchemy as sa
from sqlalchemy.orm import Session


def run():
    if not os.path.exists(".env"):
        print("No .env found. Run cp .env.example .env")
        exit(1)

    env = {}
    with open(".env", "r", encoding="utf-8") as f:
        while line := f.readline():
            key, value = line.rstrip().split("=")
            env[key] = value
    try:
        engine = sa.create_engine(
            sa.URL.create(
                drivername="mysql+pymysql",
                database=env["DB_NAME"],
                host=env["DB_HOST"],
                password=env["DB_PASSWORD"],
                port=env["DB_PORT"],
                username=env["DB_USERNAME"],
            ),
            echo=True,
        )
        print("Connected!")
    except Exception as e:
        print(f"Connection failed: {e}")

    with Session(engine) as session:
        # DELETE all tables
        session.execute(sa.text("DROP TABLE IF EXISTS notifications"))
        session.execute(sa.text("DROP TABLE IF EXISTS comments"))
        session.execute(sa.text("DROP TABLE IF EXISTS rankings"))
        session.execute(sa.text("DROP TABLE IF EXISTS institutions"))
        session.execute(sa.text("DROP TABLE IF EXISTS countries"))
        session.execute(sa.text("DROP TABLE IF EXISTS users"))

        # CREATE all tables
        session.execute(
            sa.text("""CREATE TABLE countries(
                                id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                                name VARCHAR(255) NOT NULL UNIQUE
                                )""")
        )
        session.execute(
            sa.text("""CREATE TABLE institutions(
                              id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                              country_id INT NOT NULL,
                              name VARCHAR(255) NOT NULL UNIQUE,
                              FOREIGN KEY (country_id) REFERENCES countries(id)
                              )""")
        )
        session.execute(
            sa.text("""CREATE TABLE rankings(
                              id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                              country_id INT NOT NULL,
                              institution_id INT NOT NULL,
                              ranked_year INT NOT NULL,
                              world_rank VARCHAR(255) NOT NULL,
                              academic_reputation_score VARCHAR(255),
                              academic_reputation_rank VARCHAR(255),
                              employer_reputation_score VARCHAR(255),
                              employer_reputation_rank VARCHAR(255),
                              faculty_student_score VARCHAR(255),
                              faculty_student_rank VARCHAR(255),
                              citations_per_faculty_score VARCHAR(255),
                              citations_per_faculty_rank VARCHAR(255),
                              intl_faculty_score VARCHAR(255),
                              intl_faculty_rank VARCHAR(255),
                              intl_stu_score VARCHAR(255),
                              intl_stu_rank VARCHAR(255),
                              intl_research_network_score VARCHAR(255),
                              intl_research_network_rank VARCHAR(255),
                              employment_outcome_score VARCHAR(255),
                              employment_outcome_rank VARCHAR(255),
                              sustainability_score VARCHAR(255),
                              sustainability_rank VARCHAR(255),
                              overall VARCHAR(255),
                              FOREIGN KEY (institution_id) REFERENCES institutions(id),
                              FOREIGN KEY (country_id) REFERENCES countries(id)
                              )""")
        )
        session.execute(
            sa.text("""CREATE TABLE users(
                              id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                              username VARCHAR(255) NOT NULL UNIQUE,
                              hash_password VARCHAR(255) NOT NULL
                              )""")
        )
        session.execute(
            sa.text("""CREATE TABLE comments(
                    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                    user_id INT NOT NULL,
                    institute_id INT NOT NULL,
                    comment LONGTEXT,
                    FOREIGN KEY (user_id) REFERENCES users(id),
                    FOREIGN KEY (institute_id) REFERENCES institutions(id)
            )""")
        )
        session.execute(
            sa.text("""CREATE TABLE notifications(
                    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                    user_id INT NOT NULL,
                    institute_id INT NOT NULL,
                    comment_id INT NOT NULL,
                    FOREIGN KEY (user_id) REFERENCES users(id),
                    FOREIGN KEY (comment_id) REFERENCES comments(id) ON DELETE CASCADE,
                    FOREIGN KEY (institute_id) REFERENCES institutions(id)
                    )""")
        )
        session.commit()

        def bootstrap(file: str, year: int):
            with open(file, "r", encoding="utf-8") as f:
                rows = csv.reader(f, delimiter=",")
                next(rows)  # skip header
                for row in rows:
                    institution = row[1]
                    country = row[2]

                    # insert country
                    session.execute(
                        sa.text(f"INSERT IGNORE INTO countries (name) VALUES (:name)"),
                        {"name": country},
                    )
                    country_id = session.execute(
                        sa.text(f"SELECT id FROM countries where name = :name"),
                        {"name": country},
                    ).scalar_one()

                    # insert institution
                    session.execute(
                        sa.text(
                            f"INSERT IGNORE INTO institutions (country_id, name) VALUES (:country_id, :name)"
                        ),
                        {"country_id": country_id, "name": institution},
                    )
                    institution_id = session.execute(
                        sa.text(f"SELECT id FROM institutions where name = :name"),
                        {"name": institution},
                    ).scalar_one()

                    # insert all data
                    session.execute(
                        sa.text(f"""INSERT INTO rankings (
                                          country_id,
                                          institution_id,
                                          ranked_year,
                                          world_rank,
                                          academic_reputation_score,
                                          academic_reputation_rank,
                                          employer_reputation_score,
                                          employer_reputation_rank,
                                          faculty_student_score,
                                          faculty_student_rank,
                                          citations_per_faculty_score,
                                          citations_per_faculty_rank,
                                          intl_faculty_score,
                                          intl_faculty_rank,
                                          intl_stu_score,
                                          intl_stu_rank,
                                          intl_research_network_score,
                                          intl_research_network_rank,
                                          employment_outcome_score,
                                          employment_outcome_rank,
                                          sustainability_score,
                                          sustainability_rank,
                                          overall
                                        )
                                          VALUES (
                                            {country_id},
                                            {institution_id},
                                            {year},
                                            {f"'{row[0]}'" if row[0] else 'NULL'},
                                            {f"'{row[3]}'" if row[3] else 'NULL'},
                                            {f"'{row[4]}'" if row[4] else 'NULL'},
                                            {f"'{row[5]}'" if row[5] else 'NULL'},
                                            {f"'{row[6]}'" if row[6] else 'NULL'},
                                            {f"'{row[7]}'" if row[7] else 'NULL'},
                                            {f"'{row[8]}'" if row[8] else 'NULL'},
                                            {f"'{row[9]}'" if row[9] else 'NULL'},
                                            {f"'{row[10]}'" if row[10] else 'NULL'},
                                            {f"'{row[11]}'" if row[11] else 'NULL'},
                                            {f"'{row[12]}'" if row[12] else 'NULL'},
                                            {f"'{row[13]}'" if row[13] else 'NULL'},
                                            {f"'{row[14]}'" if row[14] else 'NULL'},
                                            {f"'{row[15]}'" if row[15] else 'NULL'},
                                            {f"'{row[16]}'" if row[16] else 'NULL'},
                                            {f"'{row[17]}'" if row[17] else 'NULL'},
                                            {f"'{row[18]}'" if row[18] else 'NULL'},
                                            {f"'{row[19]}'" if row[19] else 'NULL'},
                                            {f"'{row[20]}'" if row[20] else 'NULL'},
                                            {f"'{row[21]}'" if row[21] else 'NULL'}
                                          )
                                          """)
                    )
            session.commit()

        bootstrap("_data/2025.csv", 2025)
        bootstrap("_data/2024.csv", 2024)
        bootstrap("_data/2023.csv", 2023)


if __name__ == "__main__":
    run()
