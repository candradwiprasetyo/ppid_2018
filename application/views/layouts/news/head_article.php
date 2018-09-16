<div class="c-detail-article__tag"><?= $row->UPPERDECK; ?></div>
<h1 class="c-detail-article__title"><?= $row->TITLE; ?></h1>
<div class="c-detail-article__date">
<?php //if ($this->library->get_reporter($row->ID)){ echo '<strong>'.$this->library->get_reporter($row->ID).'</strong>'." | "; } ?>
<?= $this->library->format_date($row->PUBLISH_TIMESTAMP); ?></div>
<?php $this->load->view('layouts/news/share_button_mobile'); ?>
