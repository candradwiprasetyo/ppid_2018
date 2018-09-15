<!-- article -->
<div class="row">
	<div class="col-md-8">

			<h1 class="c-main-title u-mrgn-top--20"><?= $data['title'] ?></h1>
			
			<!-- Cover large -->
			<div class="row">
			
			<?php foreach($fokus_detail as $key => $row){ 


			
			$news = $this->News_model->get_news('', '1', '', '', '', $row->ARTICLE_ID);

			?>
			<div class="col-md-6">
				<div class="c-cover c-cover-medium">
          <a href="<?= base_url().$this->library->get_url_news($news[0]->ID, $news[0]->TITLE); ?>">
            <img src="<?= $this->library->get_image($news[0]->IMAGE, 1); ?>">
          </a>
          <div class="c-cover-overlay">
            <div class="date"><?= $this->library->format_date($news[0]->PUBLISH_TIMESTAMP); ?></div>
          <div class="tag"><?= $news[0]->UPPERDECK; ?></div>
          <div class="title title-medium"><a href="<?= base_url().$this->library->get_url_news($news[0]->ID, $news[0]->TITLE); ?>"><?= $news[0]->TITLE; ?></a></div>
          </div>
        </div>
        <div class="c-cover-border">
          <div class="border-left"></div>
          <div class="border-right"></div>
        </div>
      </div>
			<?php } ?>
			</div>
    	
		
		

	</div>
	<div class="col-md-4">
		<div class="row c-main-desktop u-mrgn-top--30" style="margin-left: 10px;">
        <!-- detailberita1-news-336x280 -->
        <ins class="adsbygoogle"
            style="display:inline-block;width:336px;height:280px"
            data-ad-client="ca-pub-1783522418730843"
            data-ad-slot="7539711426">
        </ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
		</div>
		
	</div>
</div>

