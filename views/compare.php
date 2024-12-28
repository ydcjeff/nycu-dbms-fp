<?php
// output buffer on
ob_start();
// HTML templating below
?>

<div class="grid grid-cols-2 gap-x-2">
  <form action="/" method="get" class="col-start-2">
    <div class="grid grid-cols-2 gap-x-4">
      <!-- TODO: replace a big list with search box -->
      <select name="uni1" id="uni1">
        <?php foreach ($universities as $uni): ?>
          <option value="<?php echo $uni['id'] ?>" <?php echo $uni['id'] === $uni1_query ? 'selected' : '' ?>>
            <?php echo $uni['name'] ?>
          </option>
        <?php endforeach; ?>
      </select>
      <!-- TODO: replace a big list with search box -->
      <select name="uni2" id="uni2">
        <?php foreach ($universities as $uni): ?>
          <option value="<?php echo $uni['id'] ?>" <?php echo $uni['id'] === $uni2_query ? 'selected' : '' ?>>
            <?php echo $uni['name'] ?>
          </option>
        <?php endforeach; ?>
      </select>
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
// get the current output buffer and assign to $body which is used in base.php
// and clean the output buffer
$body = ob_get_clean();
require_once __DIR__ . '/base.php';
?>
