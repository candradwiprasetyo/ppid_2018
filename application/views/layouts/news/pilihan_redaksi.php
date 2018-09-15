<div class="c-box-detail-article-frame">
	<div class="c-box-detail-article">
		<div class="c-box-detail-article__title">pilihan redaksi</div>
		<ul>
			<?php foreach($editorpick as $key_editor => $row_editor){ ?>
				<li><a href="<?= base_url().$this->library->get_url_news($row_editor->ID, $row_editor->TITLE); ?>"><?= $row_editor->TITLE; ?></a></li>
			<?php } ?>
		</ul>
		
	</div>
	<div class="c-border-bottom">
        <div class="left"></div>
        <div class="right"></div>
    </div>
</div>