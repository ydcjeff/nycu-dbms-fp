<?php
// output buffer on
ob_start();
// HTML templating below
?>

<div class="grid grid-cols-2 gap-x-2">
  <form action="/" method="get" class="col-start-2">
    <input type="hidden" name="uni1" id="uni1-q" value="<?php echo $uni1_query ?>">
    <input type="hidden" name="uni2" id="uni2-q" value="<?php echo $uni2_query ?>">
    <div class="grid grid-cols-2 gap-x-4">
      <label for="uni1">Choose University 1</label>
      <label for="uni2">Choose University 2</label>
      <input list="uni1-list" id="uni1" value="<?php echo $universities[$uni1_query - 1]['name'] ?>">
      <datalist id="uni1-list">
        <?php foreach ($universities as $uni): ?>
          <option data-value="<?php echo $uni['id'] ?>">
            <?php echo $uni['name'] ?>
          </option>
        <?php endforeach; ?>
      </datalist>
      <input list="uni2-list" id="uni2" value="<?php echo $universities[$uni2_query - 1]['name'] ?>">
      <datalist id="uni2-list">
        <?php foreach ($universities as $uni): ?>
          <option data-value="<?php echo $uni['id'] ?>">
            <?php echo $uni['name'] ?>
          </option>
        <?php endforeach; ?>
      </datalist>
    </div>
    <button type="submit">Search</button>
  </form>

  <div class="col-span-full">
    <?php foreach ($uni1_ranks as $idx => $rank): ?>
      <details open>
        <summary><?php echo $rank['ranked_year'] ?></summary>
        <table class="compare">
          <tbody>
            <tr>
              <!-- add more description in th text content -->
              <th class="w-[50%]">World rank</th>
              <td class="w-[25%] text-center"><?php echo $rank['world_rank'] ?></td>
              <td class="w-[25%] text-center"><?php echo $uni2_ranks[$idx]['world_rank'] ?></td>
            </tr>

            <tr>
              <th class="w-[50%]">Academic Reputation Score</th>
              <td class="w-[25%] text-center"><?php echo $rank['academic_reputation_score'] ?></td>
              <td class="w-[25%] text-center"><?php echo $uni2_ranks[$idx]['academic_reputation_score'] ?></td>
            </tr>

            <tr>
              <th class="w-[50%]">Academic Reputation Rank</th>
              <td class="w-[25%] text-center"><?php echo $rank['academic_reputation_rank'] ?></td>
              <td class="w-[25%] text-center"><?php echo $uni2_ranks[$idx]['academic_reputation_rank'] ?></td>
            </tr>

            <tr>
              <th class="w-[50%]">Employer Reputation Score</th>
              <td class="w-[25%] text-center"><?php echo $rank['employer_reputation_score'] ?></td>
              <td class="w-[25%] text-center"><?php echo $uni2_ranks[$idx]['employer_reputation_score'] ?></td>
            </tr>

            <tr>
              <th class="w-[50%]">Employer Reputation Rank</th>
              <td class="w-[25%] text-center"><?php echo $rank['employer_reputation_rank'] ?></td>
              <td class="w-[25%] text-center"><?php echo $uni2_ranks[$idx]['employer_reputation_rank'] ?></td>
            </tr>

            <tr>
              <th class="w-[50%]">Faculty Student Score</th>
              <td class="w-[25%] text-center"><?php echo $rank['faculty_student_score'] ?></td>
              <td class="w-[25%] text-center"><?php echo $uni2_ranks[$idx]['faculty_student_score'] ?></td>
            </tr>

            <tr>
              <th class="w-[50%]">Faculty Student Rank</th>
              <td class="w-[25%] text-center"><?php echo $rank['faculty_student_rank'] ?></td>
              <td class="w-[25%] text-center"><?php echo $uni2_ranks[$idx]['faculty_student_rank'] ?></td>
            </tr>

            <tr>
              <th class="w-[50%]">Citations per Faculty Score</th>
              <td class="w-[25%] text-center"><?php echo $rank['citations_per_faculty_score'] ?></td>
              <td class="w-[25%] text-center"><?php echo $uni2_ranks[$idx]['citations_per_faculty_score'] ?></td>
            </tr>

            <tr>
              <th class="w-[50%]">Citations per Faculty Rank</th>
              <td class="w-[25%] text-center"><?php echo $rank['citations_per_faculty_rank'] ?></td>
              <td class="w-[25%] text-center"><?php echo $uni2_ranks[$idx]['citations_per_faculty_rank'] ?></td>
            </tr>

            <tr>
              <th class="w-[50%]">International Faculty Score</th>
              <td class="w-[25%] text-center"><?php echo $rank['intl_faculty_score'] ?></td>
              <td class="w-[25%] text-center"><?php echo $uni2_ranks[$idx]['intl_faculty_score'] ?></td>
            </tr>

            <tr>
              <th class="w-[50%]">International Faculty Rank</th>
              <td class="w-[25%] text-center"><?php echo $rank['intl_faculty_rank'] ?></td>
              <td class="w-[25%] text-center"><?php echo $uni2_ranks[$idx]['intl_faculty_rank'] ?></td>
            </tr>

            <tr>
              <th class="w-[50%]">International Student Score</th>
              <td class="w-[25%] text-center"><?php echo $rank['intl_stu_score'] ?></td>
              <td class="w-[25%] text-center"><?php echo $uni2_ranks[$idx]['intl_stu_score'] ?></td>
            </tr>

            <tr>
              <th class="w-[50%]">International Student Rank</th>
              <td class="w-[25%] text-center"><?php echo $rank['intl_stu_rank'] ?></td>
              <td class="w-[25%] text-center"><?php echo $uni2_ranks[$idx]['intl_stu_rank'] ?></td>
            </tr>

            <tr>
              <th class="w-[50%]">International Research Network Score</th>
              <td class="w-[25%] text-center"><?php echo $rank['intl_research_network_score'] ?></td>
              <td class="w-[25%] text-center"><?php echo $uni2_ranks[$idx]['intl_research_network_score'] ?></td>
            </tr>

            <tr>
              <th class="w-[50%]">International Research Network Rank</th>
              <td class="w-[25%] text-center"><?php echo $rank['intl_research_network_rank'] ?></td>
              <td class="w-[25%] text-center"><?php echo $uni2_ranks[$idx]['intl_research_network_rank'] ?></td>
            </tr>

            <tr>
              <th class="w-[50%]">Employment Outcome Score</th>
              <td class="w-[25%] text-center"><?php echo $rank['employment_outcome_score'] ?></td>
              <td class="w-[25%] text-center"><?php echo $uni2_ranks[$idx]['employment_outcome_score'] ?></td>
            </tr>

            <tr>
              <th class="w-[50%]">Employment Outcome Rank</th>
              <td class="w-[25%] text-center"><?php echo $rank['employment_outcome_rank'] ?></td>
              <td class="w-[25%] text-center"><?php echo $uni2_ranks[$idx]['employment_outcome_rank'] ?></td>
            </tr>

            <tr>
              <th class="w-[50%]">Sustainability Score</th>
              <td class="w-[25%] text-center"><?php echo $rank['sustainability_score'] ?></td>
              <td class="w-[25%] text-center"><?php echo $uni2_ranks[$idx]['sustainability_score'] ?></td>
            </tr>

            <tr>
              <th class="w-[50%]">Sustainability Rank</th>
              <td class="w-[25%] text-center"><?php echo $rank['sustainability_rank'] ?></td>
              <td class="w-[25%] text-center"><?php echo $uni2_ranks[$idx]['sustainability_rank'] ?></td>
            </tr>

            <tr>
              <th class="w-[50%]">Overall</th>
              <td class="w-[25%] text-center"><?php echo $rank['overall'] ?></td>
              <td class="w-[25%] text-center"><?php echo $uni2_ranks[$idx]['overall'] ?></td>
            </tr>
          </tbody>
        </table>
      </details>
    <?php endforeach; ?>
  </div>
</div>
<?php
// Fetch comments for each university
require_once __DIR__ . '/../controllers/comment_controller.php';

$commentcrtl = new CommentController();
$comments_uni1 = $commentcrtl->get_comments($uni1_query);
$comments_uni2 = $commentcrtl->get_comments($uni2_query);
?>

<div class="comments-container">
    <!-- Display comments for University 1 -->
    <div class="comments-column">
        <h3>Comments for <?php echo $universities[$uni1_query - 1]['name']; ?></h3>
        <?php foreach ($comments_uni1 as $comment): ?>
            <div class="comment">
                <p><strong>User <?php echo $comment['username']; ?>:</strong> <?php echo htmlspecialchars($comment['comment']); ?></p>
            </div>
        <?php endforeach; ?>

        <!-- Comment form for University 1 -->
        <form action="comment.php" method="post">
            <input type="hidden" name="institute_id" value="<?php echo $uni1_query; ?>">
            <textarea name="comment" placeholder="Enter your comment here"></textarea>
            <button type="submit" name="submit_comment">Submit Comment</button>
        </form>
    </div>

    <!-- Vertical line between the two columns -->
    <div class="line"></div>

    <!-- Display comments for University 2 -->
    <div class="comments-column">
        <h3>Comments for <?php echo $universities[$uni2_query - 1]['name']; ?></h3>
        <?php foreach ($comments_uni2 as $comment): ?>
            <div class="comment">
                <p><strong>User <?php echo $comment['username']; ?>:</strong> <?php echo htmlspecialchars($comment['comment']); ?></p>
            </div>
        <?php endforeach; ?>

        <!-- Comment form for University 2 -->
        <form action="comment.php" method="post">
            <input type="hidden" name="institute_id" value="<?php echo $uni2_query; ?>">
            <textarea name="comment" placeholder="Enter your comment here"></textarea>
            <button type="submit" name="submit_comment">Submit Comment</button>
        </form>
    </div>
</div>

<style>
    .comments-container {
        display: grid;
        grid-template-columns: 1fr 10px 1fr; /* Two columns with a small gap in between */
        gap: 10px;
        margin-top: 20px;
    }

    .comments-column {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    .line {
        background-color: #ddd;
        width: 1px;
        height: 100%;
        margin: 0;
    }

    .comment {
        margin-bottom: 10px;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #fff;
    }

    .comment p {
        margin: 0;
    }

    textarea {
        width: 100%;
        height: 100px;
        margin-top: 10px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        display: block;
        width: 100%;
        padding: 10px;
        margin-top: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
    }

    button:hover {
        background-color: #0056b3;
    }
</style>

<script>
  /** @type {Array<{ id: number, country_id: number, name: string }>} */
  const universities = <?php echo json_encode($universities) ?>;
  const uni1_q = document.getElementById('uni1-q');
  const uni2_q = document.getElementById('uni2-q');
  document.getElementById('uni1').addEventListener('change', (ev) => {
    uni1_q.setAttribute('value', universities.find((v) => v.name === ev.target.value).id);
  });
  document.getElementById('uni2').addEventListener('change', (ev) => {
    uni2_q.setAttribute('value', universities.find((v) => v.name === ev.target.value).id);
  });
</script>

<?php
// get the current output buffer and assign to $body which is used in base.php
// and clean the output buffer
$body = ob_get_clean();
require_once __DIR__ . '/base.php';
?>
