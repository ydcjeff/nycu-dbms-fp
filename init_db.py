# Initialize the database by creating necessary tables, inserting data...
# To run this python script, you need to install
# - sqlalchemy
# - pymysql
# pip install sqlalchemy pymysql
# Run python init_db.py -h to see help of this script

import argparse
import csv

import sqlalchemy as sa
from sqlalchemy.orm import Session


def run():
    parser = argparse.ArgumentParser(description="init db with the data")
    parser.add_argument(
        "-u",
        "--username",
        default="root",
        type=str,
        help="username to connect to MySQL",
    )
    parser.add_argument(
        "-p",
        "--password",
        default="",
        type=str,
        help="password to connect to MySQL",
    )
    parser.add_argument(
        "-H",
        "--host",
        default="127.0.0.1",
        type=str,
        help="hostname to connect to MySQL",
    )
    parser.add_argument(
        "-P",
        "--port",
        default="3306",
        type=int,
        help="port to connect to MySQL",
    )
    parser.add_argument(
        "--db",
        default="uni_ranking",
        type=str,
        help="database name to create",
    )
    args = parser.parse_args()

    engine = sa.create_engine(
        sa.URL.create(
            drivername="mysql+pymysql",
            database=args.db,
            host=args.host,
            password=args.password,
            port=args.port,
            username=args.username,
        ),
        echo=True,
    )

    with Session(engine) as session:
        # DELETE all tables
        session.execute(sa.text("DROP TABLE IF EXISTS rankings"))
        session.execute(sa.text("DROP TABLE IF EXISTS institutions"))
        session.execute(sa.text("DROP TABLE IF EXISTS countries"))
        session.execute(sa.text("DROP TABLE IF EXISTS users"))
        session.execute(sa.text("DROP TABLE IF EXISTS comments"))
        session.execute(sa.text("DROP TABLE IF EXISTS notifications"))

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

        def bootstrap(file: str, year: int):
            with open(file, "r") as f:
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

        bootstrap("2025.csv", 2025)
        bootstrap("2024.csv", 2024)
        bootstrap("2023.csv", 2023)


if __name__ == "__main__":
    run()
