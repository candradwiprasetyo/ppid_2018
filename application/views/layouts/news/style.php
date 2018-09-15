<style type='text/css'>
/*<![CDATA[*/
.paralax_div {
  position: relative;
  overflow: visible;
  width: 300px;
  height: 250px;
  margin-right: 20px;
  display: inline-block;
  float: left;
  z-index: 9999;
}
.paralax_div > div {
  overflow: hidden;
  width: 100%;
  height: 100%;
  margin: 0;
  position: absolute;
  top: 0;
  left: 0;
  clip: rect(auto auto auto auto);
}
.paralax_div > div > div {
  width: 100%;
  height: 100%;
  position: fixed;
  top: 0;
  margin: 0 auto;
  -moz-transform: translateZ(0);
  -webkit-transform: translateZ(0);
  -ms-transform: translateZ(0);
  -o-transform: translateZ(0);
  transform: translateZ(0);
}
.paralax_div > div > div > div {
  width: 100%;
  height: 100vh;
  position: absolute;
  left: 50%;
  top: 0;
  border: none;
  -moz-transform: translateX(-50%);
  -webkit-transform: translateX(-50%);
  -ms-transform: translateX(-50%);
  -o-transform: translateX(-50%);
  transform: translateX(-50%);
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-align-content: center;
  align-content: center;
  -webkit-align-items: center;
  -ms-flex-align: center;
  align-items: center;
}
.paralax_div > div > div > div > * {
  /*margin: 0;*/
  margin-top: 0;
}
.paralax_div > div > div > div > a {
  width: 100%;
  height: 100vh;
}
.paralax_div img,.paralax_div iframe,.paralax_div ins {
  height: 600px;
  width: 300px;
}
.clear {
  clear: both;
  display: block
}
@media screen and (max-width:640px) {
  .paralax_div {
    width: 100%;
    height: 250px;
    margin: 0 auto;
    float: none;
  }
  .paralax_div > div > div > div {
    left: 50%;
    -moz-transform: translateX(-50%);
    -webkit-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    -o-transform: translateX(-50%);
    transform: translateX(-50%);
  }
  .paralax_div > div > div {
    width: 100%;
    left:0;
    text-align: center;
  }
  .paralax_div img {
    margin: 0 auto;
    width:auto;
    max-width:100%;
    height:auto;
  }
}
@media screen and (max-width:320px) {
  .paralax_div iframe,.parallax_banner ins {
    margin: 0 auto;
    width:100%;
    height:600px;
  }
}
/*]]>*/
</style>



<meta property="fb:app_id" content="1616925461930268" />

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.11&appId=1616925461930268';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>