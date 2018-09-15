<div class="row">
	<div class="col-md-4">
    <div class="c-main-title"><a href="<?= base_url() ?>literasi/kamus">Kamus</a></div>
        <?php foreach($kamus as $key => $row){ ?>
        <?php if($key==0){ ?>
        <div class="c-cover c-cover-medium">
          <a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>">
            <img src="<?= $this->library->get_image($row->IMAGE, 1); ?>">
          </a>
          <div class="c-cover-overlay">
            <div class="date"><?= $this->library->format_date($row->PUBLISH_TIMESTAMP); ?></div>
          <div class="tag"><?= $row->UPPERDECK; ?></div>
          <div class="title title-medium"><a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>"><?= $row->TITLE; ?></a></div>
          </div>
        </div>
        <div class="c-cover-border">
          <div class="border-left"></div>
          <div class="border-right"></div>
        </div>
        <?php } else { ?>
        <div class="c-main-article">
          <div class="date"><?= $this->library->format_date($row->PUBLISH_TIMESTAMP); ?></div>
          <div class="tag"><?= $row->UPPERDECK; ?></div>
          <div class="title title-medium"><a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>"><?= $row->TITLE; ?></a></div>
        </div>
        <?php
        }
        }
        ?>
  </div>
  <div class="col-md-4">
    <div class="c-main-title"><a href="<?= base_url() ?>komunitas/agenda">Agenda</a></div>
    <?php foreach($agenda as $key => $row){ ?>
    <?php if($key==0){ ?>
    <div class="c-cover c-cover-medium">
      <a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>">
        <img src="<?= $this->library->get_image($row->IMAGE, 1); ?>">
      </a>
      <div class="c-cover-overlay">
        <div class="date"><?= $this->library->format_date($row->PUBLISH_TIMESTAMP); ?></div>
      <div class="tag"><?= $row->UPPERDECK; ?></div>
      <div class="title title-medium"><a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>"><?= $row->TITLE; ?></a></div>
      </div>
    </div>
    <div class="c-cover-border">
      <div class="border-left"></div>
      <div class="border-right"></div>
    </div>
    <?php } else { ?>
    <div class="c-main-article">
      <div class="date"><?= $this->library->format_date($row->PUBLISH_TIMESTAMP); ?></div>
      <div class="tag"><?= $row->UPPERDECK; ?></div>
      <div class="title title-medium"><a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>"><?= $row->TITLE; ?></a></div>
    </div>
    <?php
    }
    }
    ?>
  </div>
  <div class="col-md-4">
    <div class="c-main-title"><a href="<?= base_url() ?>komunitas/kampus">kampus</a></div>
    <?php foreach($kampus as $key => $row){ ?>
    <?php if($key==0){ ?>
    <div class="c-cover c-cover-medium">
      <a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>">
        <img src="<?= $this->library->get_image($row->IMAGE, 1); ?>">
      </a>
      <div class="c-cover-overlay">
        <div class="date"><?= $this->library->format_date($row->PUBLISH_TIMESTAMP); ?></div>
      <div class="tag"><?= $row->UPPERDECK; ?></div>
      <div class="title title-medium"><a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>"><?= $row->TITLE; ?></a></div>
      </div>
    </div>
    <div class="c-cover-border">
      <div class="border-left"></div>
      <div class="border-right"></div>
    </div>
    <?php } else { ?>
    <div class="c-main-article">
      <div class="date"><?= $this->library->format_date($row->PUBLISH_TIMESTAMP); ?></div>
      <div class="tag"><?= $row->UPPERDECK; ?></div>
      <div class="title title-medium"><a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>"><?= $row->TITLE; ?></a></div>
    </div>
    <?php
    }
    }
    ?>
  </div>
</div>

