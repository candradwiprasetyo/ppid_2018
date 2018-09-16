<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" type="text/javascript"></script>
<div id="flag">

  <div class="translation-links">
    <a data-lang="Indonesian"><img alt="Bahasa Indonesia" title="Indonesian" src="<?= base_url() ?>assets/images/flag/id.gif"></a>
    <a data-lang="English"><img alt="English" title="English" src="<?= base_url() ?>assets/images/flag/uk.png"></a>
    <a data-lang="Chinese"><img alt="Chinese" title="Chinese" src="<?= base_url() ?>assets/images/flag/Ch.gif"></a>
    <a data-lang="Japanese"><img alt="Japanese" title="Japanese" src="<?= base_url() ?>assets/images/flag/jp.jpg"></a>
    <a data-lang="Arabic"><img alt="Arabic" title="Arabic" src="<?= base_url() ?>assets/images/flag/ar.png"></a>


<div id="google_translate_element" style="margin-top: 30px;">
  <div class="skiptranslate goog-te-gadget" dir="ltr" style="">
  </div>
</div>


    <div id="google_translate_element" style="display:none;"></div>		
  </div>
</div>
	
<script type="text/javascript">
  function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'id', autoDisplay: false},     'google_translate_element'); //remove the layout
  }
</script>



<script type="text/javascript">

function triggerHtmlEvent(element, eventName)
{
    var event;
    if(document.createEvent) {
        event = document.createEvent('HTMLEvents');
        event.initEvent(eventName, true, true);
        element.dispatchEvent(event);
    }
    else {
    event = document.createEventObject();
        event.eventType = eventName;
        element.fireEvent('on' + event.eventType, event);
    }
}


$('.translation-links a').click(function(e)
{
    e.preventDefault();
    var lang = $(this).data('lang');
    $('#google_translate_element select option').each(function(){
    
      var bahasa = $(this).text();
      switch(bahasa) {
        case "Indonesia":
          bahasa = "Indonesian";
          break;
        case "Inggris" :
          bahasa = "English";
          break;
        case "Jepang" :
          bahasa = "Japanese";
          break;
        case "China (Aks. Tradisional)" :
          bahasa = "Chinese";
          break;
        case "Arab" :
          bahasa = "Arabic";
          break;
      }
      if(bahasa.indexOf(lang) > -1) {
          $(this).parent().val($(this).val());
          var container = document.getElementById('google_translate_element');
          var select = container.getElementsByTagName('select')[0];
          triggerHtmlEvent(select, 'change');
      }
    });
});

</script>

