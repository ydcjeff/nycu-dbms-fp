<?php
// get all necessary data
$uni1_query = $_GET['uni1'] || 1;
$uni2_query = $_GET['uni2'] || 2;

$rc = new RankingsController();
$universities = $rc->get_all_universities();
$uni1_ranks = $rc->find_by_institute_id(1);
$uni2_ranks = $rc->find_by_institute_id(2);

ob_start();
?>

<!-- HTML templating here -->
<div class="grid grid-cols-6 gap-x-2">
  <!-- empty div to take the space -->
  <div></div>
  <form action="/index.php" method="get" class="col-start-3 col-span-4">
    <div class="grid grid-cols-2 gap-x-4">
      <select name="uni1" id="uni1">
        <?php foreach($universities as $uni): ?>
          <option value="<?php echo $uni['id'] ?>">
            <?php print_r($uni['name']); ?>
          </option>
        <?php endforeach; ?>
      </select>
      <select name="uni2" id="uni2">
        <?php foreach($universities as $uni): ?>
          <option value="<?php echo $uni['id'] ?>">
            <?php print_r($uni['name']); ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
    <button type="submit">Search</button>
  </form>

  <div class="justify-self-center col-span-2">
    <?php foreach($uni1_ranks as $rank): ?>
      <details>
        <summary><?php echo $rank['ranked_year'] ?></summary>
        <ul>
          <li>World Rank</li>
          <li>academic_reputation_score</li>
          <li>academic_reputation_rank</li>

          <li>employer_reputation_score</li>
          <li>employer_reputation_rank</li>

          <!-- TODO: change as DB cols -->
          <li>employer_reputation_score</li>
          <li>employer_reputation_rank</li>

          <li>employer_reputation_score</li>
          <li>employer_reputation_rank</li>

          <li>employer_reputation_score</li>
          <li>employer_reputation_rank</li>

          <li>employer_reputation_score</li>
          <li>employer_reputation_rank</li>
        </ul>
      </details>
    <?php endforeach; ?>
  </div>

  <div class="justify-self-center col-span-2">
    <?php foreach($uni1_ranks as $rank): ?>
      <ul>
        <li><?php echo $rank['world_rank'] ?></li>
        <li><?php echo $rank['academic_reputation_score'] ?></li>
        <li><?php echo $rank['academic_reputation_rank'] ?></li>

        <li><?php echo $rank['employer_reputation_score'] ?></li>
        <li><?php echo $rank['employer_reputation_rank'] ?></li>

        <!-- TODO: change as DB cols -->
        <li>employer_reputation_score</li>
        <li>employer_reputation_rank</li>

        <li>employer_reputation_score</li>
        <li>employer_reputation_rank</li>

        <li>employer_reputation_score</li>
        <li>employer_reputation_rank</li>

        <li>employer_reputation_score</li>
        <li>employer_reputation_rank</li>
      </ul>
    <?php endforeach; ?>
  </div>

  <div class="justify-self-center col-span-2">
    <?php foreach($uni2_ranks as $rank): ?>
      <ul>
        <li><?php echo $rank['world_rank'] ?></li>
        <li><?php echo $rank['academic_reputation_score'] ?></li>
        <li><?php echo $rank['academic_reputation_rank'] ?></li>

        <li><?php echo $rank['employer_reputation_score'] ?></li>
        <li><?php echo $rank['employer_reputation_rank'] ?></li>

        <!-- TODO: change as DB cols -->
        <li>employer_reputation_score</li>
        <li>employer_reputation_rank</li>

        <li>employer_reputation_score</li>
        <li>employer_reputation_rank</li>

        <li>employer_reputation_score</li>
        <li>employer_reputation_rank</li>

        <li>employer_reputation_score</li>
        <li>employer_reputation_rank</li>
      </ul>
    <?php endforeach; ?>
  </div>
</div>

<!-- substitute the above html template -->
<?php
$body = ob_get_clean();
require_once __DIR__ . '/base.php';
?>
