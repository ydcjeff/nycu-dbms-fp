<?php
// output buffer on
ob_start();
// HTML templating below
?>

<div class="grid grid-cols-4 gap-x-2 h-[calc(100vh-90px)] overflow-y-auto">
  <form action="/" method="get" class="col-start-2 col-span-full sticky top-0 bg-white">
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

  <div class="col-span-full overflow-y-auto">
    <?php foreach ($uni1_ranks as $idx => $rank): ?>
      <details open>
        <summary><?php echo $rank['ranked_year'] ?></summary>
        <table class="compare">
          <tbody>
            <tr>
              <!-- add more description in th text content -->
              <th class="w-[20%]">World rank</th>
              <td class="w-[30%] text-center"><?php echo $rank['world_rank'] ?></td>
              <td class="w-[30%] text-center"><?php echo $uni2_ranks[$idx]['world_rank'] ?></td>
            </tr>

            <tr>
              <th class="w-[20%]">Academic Reputation Score</th>
              <td class="w-[30%] text-center"><?php echo $rank['academic_reputation_score'] ?></td>
              <td class="w-[30%] text-center"><?php echo $uni2_ranks[$idx]['academic_reputation_score'] ?></td>
            </tr>

            <tr>
              <th class="w-[20%]">Academic Reputation Rank</th>
              <td class="w-[30%] text-center"><?php echo $rank['academic_reputation_rank'] ?></td>
              <td class="w-[30%] text-center"><?php echo $uni2_ranks[$idx]['academic_reputation_rank'] ?></td>
            </tr>

            <tr>
              <th class="w-[20%]">Employer Reputation Score</th>
              <td class="w-[30%] text-center"><?php echo $rank['employer_reputation_score'] ?></td>
              <td class="w-[30%] text-center"><?php echo $uni2_ranks[$idx]['employer_reputation_score'] ?></td>
            </tr>

            <tr>
              <th class="w-[20%]">Employer Reputation Rank</th>
              <td class="w-[30%] text-center"><?php echo $rank['employer_reputation_rank'] ?></td>
              <td class="w-[30%] text-center"><?php echo $uni2_ranks[$idx]['employer_reputation_rank'] ?></td>
            </tr>

            <tr>
              <th class="w-[20%]">Faculty Student Score</th>
              <td class="w-[30%] text-center"><?php echo $rank['faculty_student_score'] ?></td>
              <td class="w-[30%] text-center"><?php echo $uni2_ranks[$idx]['faculty_student_score'] ?></td>
            </tr>

            <tr>
              <th class="w-[20%]">Faculty Student Rank</th>
              <td class="w-[30%] text-center"><?php echo $rank['faculty_student_rank'] ?></td>
              <td class="w-[30%] text-center"><?php echo $uni2_ranks[$idx]['faculty_student_rank'] ?></td>
            </tr>

            <tr>
              <th class="w-[20%]">Citations per Faculty Score</th>
              <td class="w-[30%] text-center"><?php echo $rank['citations_per_faculty_score'] ?></td>
              <td class="w-[30%] text-center"><?php echo $uni2_ranks[$idx]['citations_per_faculty_score'] ?></td>
            </tr>

            <tr>
              <th class="w-[20%]">Citations per Faculty Rank</th>
              <td class="w-[30%] text-center"><?php echo $rank['citations_per_faculty_rank'] ?></td>
              <td class="w-[30%] text-center"><?php echo $uni2_ranks[$idx]['citations_per_faculty_rank'] ?></td>
            </tr>

            <tr>
              <th class="w-[20%]">International Faculty Score</th>
              <td class="w-[30%] text-center"><?php echo $rank['intl_faculty_score'] ?></td>
              <td class="w-[30%] text-center"><?php echo $uni2_ranks[$idx]['intl_faculty_score'] ?></td>
            </tr>

            <tr>
              <th class="w-[20%]">International Faculty Rank</th>
              <td class="w-[30%] text-center"><?php echo $rank['intl_faculty_rank'] ?></td>
              <td class="w-[30%] text-center"><?php echo $uni2_ranks[$idx]['intl_faculty_rank'] ?></td>
            </tr>

            <tr>
              <th class="w-[20%]">International Student Score</th>
              <td class="w-[30%] text-center"><?php echo $rank['intl_stu_score'] ?></td>
              <td class="w-[30%] text-center"><?php echo $uni2_ranks[$idx]['intl_stu_score'] ?></td>
            </tr>

            <tr>
              <th class="w-[20%]">International Student Rank</th>
              <td class="w-[30%] text-center"><?php echo $rank['intl_stu_rank'] ?></td>
              <td class="w-[30%] text-center"><?php echo $uni2_ranks[$idx]['intl_stu_rank'] ?></td>
            </tr>

            <tr>
              <th class="w-[20%]">International Research Network Score</th>
              <td class="w-[30%] text-center"><?php echo $rank['intl_research_network_score'] ?></td>
              <td class="w-[30%] text-center"><?php echo $uni2_ranks[$idx]['intl_research_network_score'] ?></td>
            </tr>

            <tr>
              <th class="w-[20%]">International Research Network Rank</th>
              <td class="w-[30%] text-center"><?php echo $rank['intl_research_network_rank'] ?></td>
              <td class="w-[30%] text-center"><?php echo $uni2_ranks[$idx]['intl_research_network_rank'] ?></td>
            </tr>

            <tr>
              <th class="w-[20%]">Employment Outcome Score</th>
              <td class="w-[30%] text-center"><?php echo $rank['employment_outcome_score'] ?></td>
              <td class="w-[30%] text-center"><?php echo $uni2_ranks[$idx]['employment_outcome_score'] ?></td>
            </tr>

            <tr>
              <th class="w-[20%]">Employment Outcome Rank</th>
              <td class="w-[30%] text-center"><?php echo $rank['employment_outcome_rank'] ?></td>
              <td class="w-[30%] text-center"><?php echo $uni2_ranks[$idx]['employment_outcome_rank'] ?></td>
            </tr>

            <tr>
              <th class="w-[20%]">Sustainability Score</th>
              <td class="w-[30%] text-center"><?php echo $rank['sustainability_score'] ?></td>
              <td class="w-[30%] text-center"><?php echo $uni2_ranks[$idx]['sustainability_score'] ?></td>
            </tr>

            <tr>
              <th class="w-[20%]">Sustainability Rank</th>
              <td class="w-[30%] text-center"><?php echo $rank['sustainability_rank'] ?></td>
              <td class="w-[30%] text-center"><?php echo $uni2_ranks[$idx]['sustainability_rank'] ?></td>
            </tr>

            <tr>
              <th class="w-[20%]">Overall</th>
              <td class="w-[30%] text-center"><?php echo $rank['overall'] ?></td>
              <td class="w-[30%] text-center"><?php echo $uni2_ranks[$idx]['overall'] ?></td>
            </tr>
          </tbody>
        </table>
      </details>
    <?php endforeach; ?>

    <div class="comments-container">
      <div class="col-start-2 col-span-full grid grid-cols-2 gap-x-4">
        <!-- Display comments for University 1 -->
        <div class="comments-column">
          <h3>Comments for <?php echo $universities[$uni1_query - 1]['name']; ?></h3>
          <?php foreach ($comments_uni1 as $comment): ?>
            <div class="comment">
              <?php if (isset($_SESSION['username']) && $comment['username'] === $_SESSION['username']): ?>
                <button class="cmt-edit">Edit</button>
                <button form="del-cmt-<?php echo $comment['id'] ?>" class="cmt-del">Del</button>
              <?php endif ?>
              <strong><?php echo $comment['username']; ?>:</strong>
              <p class="whitespace-pre-wrap"><?php echo htmlspecialchars($comment['comment']); ?></p>
            </div>
            <form class="hidden" action="/" method="post">
              <input type="hidden" name="action" value="update">
              <input type="hidden" name="comment_id" value="<?php echo $comment['id'] ?>">
              <textarea name="comment" placeholder="Enter your comment here"><?php echo $comment['comment'] ?></textarea>
              <div class="grid grid-cols-2 gap-x-4">
                <button type="submit" name="submit_comment">Edit Comment</button>
                <button class="cancel-btn" type="button">Cancel</button>
              </div>
            </form>
            <form id="del-cmt-<?php echo $comment['id'] ?>" class="hidden" action="/" method="post">
              <input type="hidden" name="action" value="del">
              <input type="hidden" name="comment_id" value="<?php echo $comment['id'] ?>">
            </form>
          <?php endforeach; ?>

          <!-- Comment form for University 1 -->
          <form action="/" method="post">
            <input type="hidden" name="institute_id" value="<?php echo $uni1_query; ?>">
            <textarea name="comment" placeholder="Enter your comment here"></textarea>
            <button type="submit" name="submit_comment">Submit Comment</button>
          </form>
        </div>

        <!-- Display comments for University 2 -->
        <div class="comments-column">
          <h3>Comments for <?php echo $universities[$uni2_query - 1]['name']; ?></h3>
          <?php foreach ($comments_uni2 as $comment): ?>
            <div class="comment">
              <?php if (isset($_SESSION['username']) && $comment['username'] === $_SESSION['username']): ?>
                <button class="cmt-edit">Edit</button>
                <button form="del-cmt-<?php echo $comment['id'] ?>" class="cmt-del">Del</button>
              <?php endif ?>
              <strong><?php echo $comment['username']; ?>:</strong>
              <p class="whitespace-pre-wrap"><?php echo htmlspecialchars($comment['comment']); ?></p>
            </div>
            <form class="hidden" action="/" method="post">
              <input type="hidden" name="action" value="update">
              <input type="hidden" name="comment_id" value="<?php echo $comment['id'] ?>">
              <textarea name="comment" placeholder="Enter your comment here"><?php echo $comment['comment'] ?></textarea>
              <div class="grid grid-cols-2 gap-x-4">
                <button type="submit" name="submit_comment">Edit Comment</button>
                <button class="cancel-btn" type="button">Cancel</button>
              </div>
            </form>
            <form id="del-cmt-<?php echo $comment['id'] ?>" class="hidden" action="/" method="post">
              <input type="hidden" name="action" value="del">
              <input type="hidden" name="comment_id" value="<?php echo $comment['id'] ?>">
            </form>
          <?php endforeach; ?>

          <!-- Comment form for University 2 -->
          <form action="/" method="post">
            <input type="hidden" name="institute_id" value="<?php echo $uni2_query; ?>">
            <textarea name="comment" placeholder="Enter your comment here"></textarea>
            <button type="submit" name="submit_comment">Submit Comment</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  .comments-container {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 1rem;
    margin: 30px 0;
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
    position: relative;
    margin-bottom: 10px;
    padding: 8px;
    padding-right: 3rem;
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

  .cmt-edit,
  .cmt-del {
    font-size: .85rem;
    position: absolute;
    padding: 0;
    top: 8px;
    right: 8px;
    background: none;
    border: none;
    color: black;
    margin: 0;
  }

  .cmt-del {
    top: auto;
    bottom: 8px;
  }

  button[type="submit"]:hover {
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
  document.querySelectorAll('.cmt-edit').forEach((n) => {
    n.addEventListener('click', (e) => {
      const btn = /** @type {HTMLButtonElement} */ (e.target);
      const parent = btn.parentElement;
      const form = parent.nextElementSibling;
      parent.classList.add('hidden');
      form.classList.remove('hidden');
    });
  });
  document.querySelectorAll('.cancel-btn').forEach((n) => {
    n.addEventListener('click', (e) => {
      const btn = /** @type {HTMLButtonElement} */ (e.target);
      const parent = btn.parentElement.parentElement;
      const cmt = parent.previousElementSibling;
      parent.classList.add('hidden');
      cmt.classList.remove('hidden');
    });
  });
</script>

<?php
// get the current output buffer and assign to $body which is used in base.php
// and clean the output buffer
$body = ob_get_clean();
require_once __DIR__ . '/base.php';
?>
