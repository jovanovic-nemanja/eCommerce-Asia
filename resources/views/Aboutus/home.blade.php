@extends('Aboutus.master')

    @section('title')
    
    @section('content')
        <div class="navbar">
    <div class="container"> <a class="logo" href="{{ URL::to('/',null)}}" target="_blank"><img src="../images/logo.png" class="largeLogo"><img src="../images/logo.png" class="smallLogo"></a>
      <menu>
        <li><a href="javascript:section.goTo(1);">About BuyerSeller</a></li>
        <li><a href="#" target="_blank">Media Room</a></li>
        <li><a href="javascript:section.goTo(12);">Contact BuyerSeller</a></li>
        <li><a href="#" target="_blank">Register Now</a></li>
        <li><a href="#" target="_blank">My BuyerSeller</a></li>
        <li><a href="#">Login</a></li>
      </menu>
    </div>
  </div>
   
   <!--END: header--> 
   
   <!--START: sidemenu--> 

   <div class="sideMenu">
    <div class="smInner">
        <ul class="itemList">
            <li class="item" hash="home"><a href="javascript:section.goTo(1);">Home</a>
            </li>

            <li class="item" hash="explore-and-connect"><a href="javascript:section.goTo(2);">Our Work</a>
            </li>
            <li class="item" style="display:none;" hash="showcase-service-hong-kong">
                <a href="javascript:section.goTo(3);"></a>
            </li>
            <li class="item" style="display:none;" hash="enhancing-hong-kong-smes-capabilities">
                <a href="javascript:section.goTo(4);"></a>
            </li>

            <li class="item" hash="our-mission"><a href="javascript:section.goTo(5);">Our Mission</a>
            </li>
            <li class="item" hash="the-council"><a href="javascript:section.goTo(6);">The Council</a>
            </li>
            <li class="item" hash="the-managment"><a href="javascript:section.goTo(7);">The Management</a>
            </li>
            <li class="item" hash="corporate-structure"><a href="javascript:section.goTo(8);">Corporate Structure</a>
            </li>
            <li class="item" hash="global-network"><a href="javascript:section.goTo(9);">Global Network</a>
            </li>
            <li class="item" hash="corporate-publications"><a href="javascript:section.goTo(10);">Corporate Publications</a>
            </li>
            <li class="item" hash="career"><a href="javascript:section.goTo(11);">Career</a>
            </li>
            <li class="item" hash="contact-us"><a href="javascript:section.goTo(12);">Contact Us</a>
            </li>
        </ul>

        <ul class="funcList">

            <li class="item business">
                <div class="showBox">
                    <img src="#" class="thumb">
                    <h5></h5>
                    <i class="arrow"></i>
                </div>
                <a href="#" target="_blank" class="link">
                <i class="icon"></i><span>Bangladesh Means Business</span></a>
            </li>

            <li class="item media">
                <div class="showBox">
                    <img src="#" class="thumb">
                    <h5></h5>
                    <i class="arrow"></i>
                </div>
                <a href="#" target="_blank" class="link">
                <i class="icon"></i>Media Room</a>
            </li>

            <li class="item events">
                <div class="showBox">
                    <img src="#" class="thumb">
                    <h5></h5>
                    <i class="arrow"></i>
                </div>
                <a href="#" target="_blank" class="link">
                    <i class="icon"></i>Events</a>
            </li>

            <li class="item videos">
                <div class="showBox">
                    <img src="#" class="thumb">
                    <h5></h5>
                    <i class="arrow"></i>
                </div>

                <a href="#" target="_blank" class="link">

                    <i class="icon"></i>Corporate Videos</a>
            </li>
        </ul>

    </div>
    <a href="javascript:void(0)" class="toggleBtn">
        <i class="tgIcon"></i>
    </a>
</div>
 
   <!--END: sidemenu-->

   <!--START: loading Mask-->

   <div class="loadingMask"></div>

  <div class="transMask"></div>

   <!--END: loading Mask-->
   
   <div class="blkWrap">
      <div class="baseBLK BLKvideo BLK1">
	  
	  <img class="emam" src="../img/slider.jpg" alt="" />

<dl class="tagline" data-center="top: 0px; opacity:1;" data-bottom="opacity:0; top: -300px;">
    <dt>
        <img src="../images/en/section1/tagline.png" id="Tagline">
    </dt>
    <dd>
        <span class="btnContainer">
            <a href="javascript:goToSlide(1);" class="linkStroke">DISCOVER</a>
            <span class="bgFill"></span>
        </span>

        <div class="scrollSign">
            <a href="javascript:goToSlide(1);" class="icoScroll icoScrollAni"></a>
            <img src="../images/en/section1/scroll_down_txt.png" class="scrollText">
        </div>
    </dd>
</dl>

<div class="btmCtn">

    <div class="container">
        <div class="port floatLt">

            <div class="article explore">
                <h1>Explore and Connect</h1>
                <p class="desc">Explore new markets and create global business opportunities for Bangladesh SMEs.</p>
                <a href="javascript:;" class="linkArrow">More details</a>
            </div>

            <div class="article showcase">
                <h1>Showcasing Bangladesh Services</h1>
                <p class="desc">Position Bangladesh as Asia’s global business platform and promote Bangladesh services to the world.</p>
                <a href="javascript:;" class="linkArrow">More details</a>
            </div>

            <div class="article enhance">
                <h1>Enhancing SME's Capabilities</h1>
                <p class="desc">Sharpen Bangladesh SMEs' capabilities with SME-focused events and services</p>
                <a href="javascript:;" class="linkArrow">More details</a>
            </div>

        </div>
        <ul class="floatLt compBubble BLKoneBubbles">

            <li>
                <img src="../images/section1/bubble_2.png" class="thumb">
                <div class="tag" onClick="javascript:section.goTo(2);">
                    <p>
                        <img src="../images/en/section1/bubble_txt_2.png" alt="Explore and Connect">
                    </p>
                    <span class="frame"></span>

                    <div class="bgLayer"></div>
                </div>
            </li>
            <li>
                <div class="tag" onClick="javascript:section.goTo(3);">
                    <p>
                        <img src="../images/en/section1/bubble_txt_1.png" alt="Showcasing Bangladesh Services">
                    </p>

                    <span class="frame"></span>

                    <div class="bgLayer"></div>

                </div>
            </li>

            <li>
                <div class="tag" onClick="javascript:section.goTo(4);">
                    <p>
                        <img src="../images/en/section1/bubble_txt_3.png" alt="Enhancing SME's Capabilities">
                    </p>
                    <span class="frame"></span>

                    <div class="bgLayer"></div>
                </div>
            </li>
        </ul>
    </div>
</div></div>
     <div class="baseBLK BLK2 BLK2-2 explore"> 
	 <span style="background-position: 50% 49.4792px; background-image: url(&quot;http://aboutus.bditdc.com/img/bd1.jpg&quot;);" class="BLKbg skrollable skrollable-between" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -100px;" data-bottom-top="background-position: 50% 100px;"></span>

<div class="infoBox">
  <h2 class="title opening"><img src="../images/en/section2/explore/title_explore.png"/></h2>

  <div class="intro">
    <p>Explore new markets and create global business opportunities for Bangladesh SMEs.</p>
    <p>To help Bangladesh SMEs explore and expand global trade and business frontiers, the BuyerSeller.Asia organised 340 promotion activities, 470 networking or outreach events and received about 700 missions in 2012/13. </p>
  </div>

<div class="twrap">
  <div class="whatWeDo clearfix">
    <img src="../images/en/section2/explore/title_whatwedo.png" class="titleText"/>

    <a href="javascript:void(0);" onClick="javascript:$('#explorePop').fadeIn();$('.scrollPane').jScrollPane();" class="overview">Overview <i class="fic"></i></a>


  </div>

    <ul class="listTbl">
		<li><a href="javascript:void();">Exhibitions and Conferences</a></li>
		<li><a href="javascript:void();">Product Magazines</a></li>
		<li><a href="javascript:void();">eMarketplace– bditdc.com</a></li>
		<li><a href="javascript:void();">Small Order Zone – Buy Now</a></li>
		<li><a href="javascript:void();">Integrated Sourcing platforms</a></li>
		<li><a href="javascript:void();">Business Matching</a></li>
		<li><a href="javascript:void();">BDITDC Design Gallery</a></li>
		<li><a href="javascript:void();">Product Promotions</a></li>
		<li><a href="javascript:void();">Service Promotions</a></li>
		<li><a href="javascript:void();">Global Trade Cooperation Initiatives</a></li>
    </ul>
 </div>
</div>


<!-- quote tag -->
<table class="quoteTagText" data-bottom="opacity: 0;" data-center="opacity:1">
  <tr>
    <td class="pic"></td>
    <td class="ctn" id="quoteText"></td>
  </tr>
</table>
<!-- quote tag end--></div>
     <div class="baseBLK BLK2 BLK2-1 showcase"> 
	 <span data-bottom-top="background-position: 50% 100px;" data-top-bottom="background-position: 50% -100px;" data-center="background-position: 50% 0px;" class="BLKbg skrollable skrollable-between" style="background-position: 50% 68.0782px; background-image: url(&quot;http://aboutus.bditdc.com/img/bd2.jpg&quot;);"></span>
<div class="infoBox">
  <h2 class="title opening"><img src="../images/en/section2/showcase/title_showcasing.png"></h2>
  <div class="intro">
    <p>Position Bangladesh as Asia’s global business platform and promote Bangladesh services to the world.</p>
      <p>
        By organising nearly 170 promotion activities a year focusing on services promotions, the BDITDC successfully connects Bangladeshi services companies to nearly 135,000 business contacts around the world. Overseas companies use Bangladesh’s global business platform to access the Asian market, and the mainland in particular.
    </p>
  </div>
  <br>
  <div class="videoInfo">
    <table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><a class="thumb showVideoBox mvLink" href="javascript:getVideoItem();"> <img src="../img/hqdefault.jpg" id="mvImg"> <i class="playIcon"></i> </a></td>
        <td class="content"><p class="tag"><img src="../images/icon-video.png"> <a href="javascript:getVideoItem();" class="mvLink" id="mvTitle">Think Asia. Think Bangladesh.</a></p>
          <a class="linkArrow showVideoBox" href="javascript:getVideoItem();">More videos</a></td>
      </tr>
    </table>
  </div>
  
  <div class="whatWeDo clearfix">
    <img src="../images/en/section2/showcase/title_wepromote.png" class="titleText">


    <a href="javascript:void(0);" onclick="javascript:$('#showCasePop').fadeIn();$('.scrollPane').jScrollPane();" class="overview">Overview <i class="fic"></i></a>

  </div>

  <ul class="galleryTag" id="galleryTag">
  </ul>
</div>
</div>
     <div class="baseBLK BLK2 BLK2-3 enhancing"> 
	 
	 <span data-bottom-top="background-position: 50% 100px;" data-top-bottom="background-position: 50% -100px;" data-center="background-position: 50% 0px;" class="BLKbg skrollable skrollable-between" style="background-position: 50% 14.3322px; background-image: url(&quot;http://aboutus.bditdc.com/img/bd3.jpg&quot;);"></span>
	 
<div class="infoBox">
  <h2 class="title opening"><img src="../images/en/section2/enhancing/title_enhancing.png"/></h2>
  <div class="intro">
    <p>Sharpen Bangladesh SMEs' capabilities with SME-focused events and services</p>
    <p>BuyerSeller.Asia organises more than 100 targeted events, such as SME-focused exhibitions, seminars, workshops and forums each year, which are attended by approximately 30,000 Bangladesh SMEs.</p>
  </div>

<div class="twrap">
  <div class="whatWeDo clearfix">
    <img src="../images/en/section2/explore/title_whatwedo.png" class="titleText"/>


    <a href="javascript:void(0);" onClick="javascript:$('#enhancePop').fadeIn();$('.scrollPane').jScrollPane();" class="overview">Overview <i class="fic"></i></a>
    </div>

    <ul class="listTbl">
      <li><a href="javascript:void();">BuyerSeller.Asia Research</a></li>
      <li><a href="javascript:void();">World SME Expo</a></li>
      <li><a href="javascript:void();">Entrepreneur Day</a></li>
      <li><a href="javascript:void();">SME Support: SME Portal</a></li>
      <li><a href="javascript:void();">SME Support: SME Centre</a></li>
      <li><a href="javascript:void();">SME Support: Business Advisory</a></li>
      <li><a href="javascript:void();">SME Support: Seminars Workshops</a></li>
      <li><a href="javascript:void();">SME Support: Register in BDITDC Databank</a></li>
      <li><a href="javascript:void();">SME Support: Nurture Business Startup</a></li>
      <li><a href="javascript:void();" sid="10" class="showBoxLink">Design Competition</a>
        <div class="detailBox">
              <ul>
                <li>Watch &amp; Clock</li>
                <li>Jewellery</li>
                <li>Optical/ Eye wear</li>
                <li>Fashion Design</li>
                <li>Connecting fashion talents (Building fashion community)</li>
              </ul>
            </div>
      </li>
    </ul>



</div>

</div>
</div>
     <div class="baseBLK BLK3">
	 
	<span data-bottom-top="background-position: 50% 100px;" data-top-bottom="background-position: 50% -100px;" data-center="background-position: 50% 0px;" class="BLKbg skrollable skrollable-between" style="background-position: 50% -13.242px; background-image: url(&quot;http://aboutus.bditdc.com/img/dhaka_city.jpg&quot;);"></span>

<div class="infoBox greyBg">
	<h2 class="title opening"><img src="../images/en/section3/title_our_mission.png"></h2>

<div id="ourmission">
<p>
	The Bditdc’s mission is to create opportunities for Bangladesh companies. We focus on delivering value by promoting trade in goods and services, while connecting the world’s small and medium-sized enterprises (SMEs) through Bangladesh’s business platform.</p>
<p>
	In striving to be the best trade promotion organisation in the world, the Bditdc is committed to:</p>
<ul class="bulletOrange">
	<li>
		developing and expanding new frontiers by exploring, learning and innovating</li>
	<li>
		creating and delivering value to our customers</li>
	<li>
		building on Bangladesh’s economic success through global business</li>
	<li>
		maintaining trust, respect and openness in all our relationships</li>
</ul>
<p>
	<a target="_blank" href="#" class="linkArrowOrange">BuyerSeller.Asia Service Pledge</a></p>
</div>


</div></div>
     <div class="baseBLK BLK4">
	 <span data-bottom-top="background-position: 50% 100px;" data-top-bottom="background-position: 50% -100px;" data-center="background-position: 50% 0px;" class="BLKbg skrollable skrollable-between" style="background-position: 50% 44.3769px; background-image: url(&quot;http://aboutus.bditdc.com/img/songshod_vaban.jpg&quot;);"></span>

<div class="infoBox greyBg">
	<h2 class="title opening"><img src="../images/en/section4/title_council.png"></h2>



<div id="theCouncil"><p>
	We are governed by a 19-member Council of Bangladesh business leaders and senior Government officials. 
	It plans and supervises Bditdc's global operations, services and promotional activities. 
	The Council also oversees the operation of the Bangladesh Convention and Exhibition Centre.</p>
<p>
	Mr Kazi Ahmed is the first Bditdc Chairman since the Council's establishment in 2015. He assumed the
	Chairmanship of the BuyerSeller.Asia on 1 February 2015. The Executive
	Director, Kazi Ahmed, who heads the Executive, is responsible to the Council for Bditdc's worldwide 
	operations.</p>

<p>The Council is made up of the following members:</p>
<ul class="gridList">
	<li class="highlight">
		<a href="#concilInfo" class="concilPop">Kazi Ahmed</a></li>
	<li>Ms. Momo Zhencui</li>
</ul>
</div>

</div></div>
     <div class="baseBLK BLK6"><!--START: template for profilebox -->
<span data-bottom-top="background-position: 50% 100px;" data-top-bottom="background-position: 50% -100px;" data-center="background-position: 50% 0px;" class="BLKbg skrollable skrollable-between" style="background-position: 50% 19.4529px; background-image: url(&quot;http://aboutus.bditdc.com/img/ship.jpg&quot;);"></span>
<script id="box" type="text/x-handlebars-template">
<div class="box" pid="{{ID}}" btnname="{{BtnName}}">
	<div class="picWrap">
		<img src="{{ThumbnailPath}}" class="pic">
		<div class="picTpl"></div>
		<div class="picTplHover"></div>
	</div>
	<div class="titleInfo">
		<h2 class="title">{{Title}}</h2>
		<h1 class="name">{{Name}}</h1>
	</div>
</div>
</script>
<!--END: template for profilebox -->
<!--START: template for profile popup  -->
<script id="popBox" type="text/x-handlebars-template">
<div class="popBox" pid="{{ID}}"  btnname="{{BtnName}}">

	<div class="picWrap grey">
		<img src="{{ThumbnailPath}}" class="pic">
		<div class="picTpl"></div>
	</div>

		<div class="info">
		<h1 class="name">{{Name}}</h1>
		<h2 class="title">{{Title}}</h2>
		<div class="intro scrollPane">{{{Bio}}}</div>
		</div>

		<a href="{{ProfileFile}}" target="_blank" class="btnDownload"></a>
		<a href="javascript:void();" class="closeBtn"></a>


</script>
<!--END: template for profile popup  -->
<div class="magWarp">
	<h1 class="title"><img src="../images/en/section6/title_the_management.png"></h1>

	<div class="jcarousel-wrapper">
		<!-- Carousel -->
		
		<div class="jcarousel" data-jcarousel="true"><ul style="left: 0px; top: 0px;"><li class="box6c">
<div btnname="Kazi Ahmed" pid="5" class="box boxL" style="cursor: pointer;">
	<div class="picWrap">
		<img class="pic" src="../img/kazi_ahmed.jpg">
		<div class="picTpl"></div>
		<div class="picTplHover" style="display: none;"></div>
	</div>
	<div class="titleInfo">
		<h2 class="title">Executive Director</h2>
		<h1 class="name">Kazi Ahmed</h1>
	</div>
</div>

<div btnname="Momo Z." pid="1" class="box boxM" style="cursor: pointer;">
	<div class="picWrap">
		<img class="pic" src="../img/momo_zenchui.jpg">
		<div class="picTpl"></div>
		<div class="picTplHover" style="display: none;"></div>
	</div>
	<div class="titleInfo">
		<h2 class="title">Deputy Executive Director</h2>
		<h1 class="name">Momo Z.</h1>
	</div>
</div>

<div btnname="Momo Momo" pid="6" class="box boxM" style="cursor: pointer;">
	<div class="picWrap">
		<img class="pic" src="../img/kazi_ahmed.jpg">
		<div class="picTpl"></div>
		<div class="picTplHover" style="display: none;"></div>
	</div>
	<div class="titleInfo">
		<h2 class="title">Deputy Executive Director</h2>
		<h1 class="name">Kazi</h1>
	</div>
</div>

</li><li class="box8">
<div btnname="Yvonne So" pid="19" class="box">
	<div class="picWrap">
		<img class="pic" src="/Data/images/TheManagement/profile/_108x148/Yvonne-So2_108x148.png">
		<div class="picTpl"></div>
		<div class="picTplHover" style="display: none;"></div>
	</div>
	<div class="titleInfo">
		<h2 class="title">Director, Corporate Communication and Marketing</h2>
		<h1 class="name">Yvonne So</h1>
	</div>
</div>

<div btnname="Johnny Wan" pid="9" class="box">
	<div class="picWrap">
		<img class="pic" src="/Data/images/TheManagement/profile/_108x148/Johnny-Wan1_108x148.png">
		<div class="picTpl"></div>
		<div class="picTplHover" style="display: none;"></div>
	</div>
	<div class="titleInfo">
		<h2 class="title">Director, Exhibitions Market Development</h2>
		<h1 class="name">Johnny Wan</h1>
	</div>
</div>

<div btnname="William Chui" pid="13" class="box">
	<div class="picWrap">
		<img class="pic" src="/Data/images/TheManagement/profile/_108x148/William-Chui1_108x148.png">
		<div class="picTpl"></div>
		<div class="picTplHover" style="display: none;"></div>
	</div>
	<div class="titleInfo">
		<h2 class="title">Director, International &amp; Mainland Relations</h2>
		<h1 class="name">William Chui</h1>
	</div>
</div>

<div btnname="Stephen Liang" pid="11" class="box">
	<div class="picWrap">
		<img class="pic" src="/Data/images/TheManagement/profile/_108x148/Stephen-Liang1_108x148.png">
		<div class="picTpl"></div>
		<div class="picTplHover" style="display: none;"></div>
	</div>
	<div class="titleInfo">
		<h2 class="title">Director, Product Promotion</h2>
		<h1 class="name">Stephen Liang</h1>
	</div>
</div>

<div btnname="Loretta Wan" pid="10" class="box">
	<div class="picWrap">
		<img class="pic" src="/Data/images/TheManagement/profile/_108x148/Loretta-Wan1_108x148.png">
		<div class="picTpl"></div>
		<div class="picTplHover" style="display: none;"></div>
	</div>
	<div class="titleInfo">
		<h2 class="title">Director, Publications &amp; E-Commerce</h2>
		<h1 class="name">Loretta Wan</h1>
	</div>
</div>

<div btnname="Nicholas Kwan" pid="14" class="box">
	<div class="picWrap">
		<img class="pic" src="/Data/images/TheManagement/profile/_108x148/Nicholas-Kwan1_108x148.png">
		<div class="picTpl"></div>
		<div class="picTplHover"></div>
	</div>
	<div class="titleInfo">
		<h2 class="title">Director of Research</h2>
		<h1 class="name">Nicholas Kwan</h1>
	</div>
</div>

<div btnname="Jenny Koo " pid="12" class="box">
	<div class="picWrap">
		<img class="pic" src="/Data/images/TheManagement/profile/_108x148/Jenny-Koo1_108x148.png">
		<div class="picTpl"></div>
		<div class="picTplHover"></div>
	</div>
	<div class="titleInfo">
		<h2 class="title">Director, Service Promotion</h2>
		<h1 class="name">Jenny Koo </h1>
	</div>
</div>
</li></ul></div>
		<!-- Prev/next controls -->
		<!-- Pagination -->

		<div class="popContent">

		
<div btnname="Kazi Ahmed" pid="5" class="popBox" style="display: none;">

	<div class="picWrap grey">
		<img class="pic" src="../img/kazi_ahmed.jpg">
		<div class="picTpl"></div>
	</div>

		<div class="info">
		<h1 class="name">Kazi Ahmed</h1>
		<h2 class="title">Executive Director</h2>
		<div class="intro scrollPane jspScrollable" style="overflow: hidden; padding: 0px; width: 580px;" tabindex="0">
<div class="jspContainer" style="width: 580px; height: 420px;"><div class="jspPane" style="padding: 0px; top: 0px; width: 567px;"><p>
	Ms Kazi Ahmed is the Executive Director of the BuyerSeller.Asia since 1 October 2014. With a global network of more than 40 offices, Ms Fong heads this international team whose mission is to create and facilitate opportunities in global trade for Bangladesh-based companies. She joined the Bditdc in 2010 as Deputy Executive Director, responsible for the international promotion of Bangladesh’s product and service industries and the Council’s office network worldwide.<br>
	<br>
	Ms Fong has worked in a variety of public service posts, beginning her career as an Administrative Officer with the Bangladesh Government. From 1997 to 1999, she served as Deputy Director-General in the Washington Economic and Trade Office of the Bangladesh SAR Government.&nbsp; &nbsp;<br>
	<br>
	She was Deputy Secretary for Transport from 1999 to 2004, Director-General of the Washington Economic and Trade Office from 2004 to 2006, and Commissioner for Economic and Trade Affairs, USA, from 2006 to 2008, representing the Bangladesh SAR Government in the United States. Before joining the Bditdc, Ms Fong was the Commissioner for Tourism from November 2008 to the end of 2009. She is a graduate of the University of Bangladesh.<br>
	<br>
	Ms Fong is a member of the Working Group on Convention and Exhibition Industries and Tourism under the Economic Development Commission, the Consultative Committee on Economic and Trade Co-operation between Bangladesh and the Mainland, the Aviation Development Advisory Committee, the Bangladesh Maritime Industry Council, the Bangladesh Logistics Development Council, the Working Group on Intellectual Property Trading, and the Financial Services Development Council.<br>
	<br>
	<span style="font-size:10px;">Updated 19.1.15</span></p></div><div class="jspVerticalBar"><div class="jspCap jspCapTop"></div><div class="jspTrack" style="height: 420px;"><div class="jspDrag" style="height: 319px; top: 0px;"><div class="jspDragTop"></div><div class="jspDragBottom"></div></div></div><div class="jspCap jspCapBottom"></div></div></div></div>
		</div>

		<a class="btnDownload" target="_blank" href="/Data/files/Profile/Margaret%20Fong-EN.pdf"></a>
		<a class="closeBtn" href="javascript:void();"></a>


</div>
<div btnname="Momo Z." pid="1" class="popBox">

	<div class="picWrap grey">
		<img class="pic" src="../img/momo_zenchui.jpg">
		<div class="picTpl"></div>
	</div>

		<div class="info">
		<h1 class="name">Momo Z.</h1>
		<h2 class="title">Deputy Executive Director</h2>
		<div class="intro scrollPane" style="overflow: hidden; padding: 0px; width: 0px;">



<div class="jspContainer" style="width: 0px; height: 420px;"><div class="jspPane" style="padding: 0px; top: 0px; width: 0px;"><div>
	<span style="color:#a9a9a9;">Areas of Responsibility:</span></div><div>
	<span style="color:#a9a9a9;">Exhibitions, Publications &amp; E-commerce&nbsp;</span></div><div>
	&nbsp;</div><p>
	Momo Z. Kai-Leung is a Deputy Executive Director of the BuyerSeller.Asia, the statutory organisation responsible for promoting Bangladesh's external trade.<br>
	<br>
	Mr Chau was a banker before joining the Bditdc in 1984. In a career spanning more than 25 years, he has been involved in a great variety of trade promotion activities, specialising in China trade promotion. He worked in the Bditdc's Beijing and Shanghai branch offices from 1986 to 1988, and has organised numerous Bangladesh pavilions and exhibitions on the Chinese mainland.<br>
	<br>
	Mr Chau has led the Bditdc’s Exhibitions and Exhibition Services divisions since 1997, building the Bditdc’s fair portfolio to more than 30 annual exhibitions. Under his leadership, it forms 10 largest marketplaces of their kind in Asia, with four being the largest marketplaces in the world.<br>
	<br>
	In 2004, Mr Chau was also appointed to head the Bditdc’s Trade Publications Department, which publishes more than 20 print and online product magazines and industry supplements a year. In 2006, the E-Commerce Department was added to his portfolio, to better integrate the Bditdc’s exhibitions, publications and online marketplace.<br>
	<br>
	From 2007 to 2009, Mr Chau oversaw both the Product Promotion and Service Promotion Divisions, spearheading the Bditdc’s manufacturing and service industries’ promotions on the mainland and overseas. The extensive programme includes more than 200 projects a year designed to enhance Bangladesh's role as Asia's leading sourcing centre and to help Bangladesh companies tap into business opportunities around the world. During this period, Mr Chau also oversaw the Bditdc’s Design Gallery. With three retail outlets in Bangladesh and numerous branches on the Chinese mainland, Design Gallery promotes Bangladesh designers and creative excellence in product design.</p></div></div></div>
		</div>

		<a class="btnDownload" target="_blank" href="/Data/files/The%20Management/Benjamin_EN.pdf"></a>
		<a class="closeBtn" href="javascript:void();"></a>


</div>
<div btnname="Momo Momo" pid="6" class="popBox">

	<div class="picWrap grey">
		<img class="pic" src="../img/momo_zenchui.jpg">
		<div class="picTpl"></div>
	</div>

		<div class="info">
		<h1 class="name">Momo Momo</h1>
		<h2 class="title">Deputy Executive Director</h2>
		<div class="intro scrollPane" style="overflow: hidden; padding: 0px; width: 0px;">

<div class="jspContainer" style="width: 0px; height: 420px;"><div class="jspPane" style="padding: 0px; top: 0px; width: 0px;"><div>
	<div>
		<span style="color:#a9a9a9;">Areas of Responsibility:</span></div>
	<div>
		<p>
			<span style="color:#a9a9a9;">Product and Service Promotion, Branch and Consultant Offices, International and Mainland relations, Marketing and Customer Service, Corporate Communication, Media and Public Affairs, Overseas Secretariat.</span><br>
			<span style="color:#a7a4a5;">&nbsp;</span><br>
			Momo Momo is the Deputy Executive Director, Marketing of the BuyerSeller.Asia, the statutory organisation responsible for promoting and developing Bangladesh's international trade in products and services..<br>
			&nbsp;<br>
			Mr Yip has worked in a variety of positions and offices at the Bditdc, including New York, Tokyo and London. His recent postings include: Director, Industry Promotion; Director, Exhibitions; Director, Information Service (E-commerce development); Regional Director, Western Europe/Middle East and Africa (based in London).<br>
			&nbsp;<br>
			In his present position, Mr Yip is responsible for Bditdc’s marketing and external relations, as well as the organisation’s network of over 40 offices worldwide.&nbsp; He also oversees promotion of the product and service sectors,&nbsp; in addition to corporate marketing and communication.<br>
			&nbsp;<br>
			Mr Yip graduated from the Chinese University of Bangladesh with an honours degree in Business Administration. He attended the Columbia Senior Executive Programme in 2003, and holds a Graduate Professional Diploma in E-Business, awarded by Michigan State University. He is a Fellow of the Chartered Institute of Marketing of the UK.<br>
			<span style="color:#a7a4a5;">&nbsp;</span></p>
		<p>
			&nbsp;</p>
	</div>
	<p>
		&nbsp;</p>
</div><p>
	&nbsp;</p></div></div></div>
		</div>

		<a class="btnDownload" target="_blank" href="/Data/files/The%20Management/Raymond%20Yip_EN.pdf"></a>
		<a class="closeBtn" href="javascript:void();"></a>


</div>
</div>
	</div>

</div></div>
     <div class="baseBLK BLK7">
	 
	<span data-bottom-top="background-position: 50% 100px;" data-top-bottom="background-position: 50% -100px;" data-center="background-position: 50% 0px;" class="BLKbg skrollable skrollable-between" style="background-position: 50% 33.8906px; background-image: url(&quot;http://aboutus.bditdc.com/img/cs.jpg&quot;);"></span>

<div class="contentInner">
	<h1 class="title"><img src="../images/en/section7/title_cop_structure.png"></h1>
	<ul class="corpCir">
		<li class="fadeHov"><span class="frame"></span><a href="#" class="popGrid"><img src="../images/en/section7/cir-1-exhibitions.png"/></a>
		</li>
		<li class="fadeHov"><span class="frame"></span><a href="#" class="popGrid"><img src="../images/en/section7/cir-5-intern.png"></a>
		</li>
		<li class="fadeHov"><span class="frame"></span><a href="#" class="popGrid"><img src="../images/en/section7/cir-3-product.png"></a>
		</li>
		<li class="fadeHov"><span class="frame"></span><a href="#" class="popGrid"><img src="../images/en/section7/cir-2-pub.png"></a></li>
		<li class="fadeHov"><span class="frame"></span><a href="#" class="popGrid"><img src="../images/en/section7/cir-4-service.png"></a>
		</li>
		<li class="fadeHov"><span class="frame"></span><a href="#" class="popGrid"><img src="../images/en/section7/cir-comm-n-affairs.png"></a>
		</li>
		<li class="fadeHov"><span class="frame"></span><a href="#" class="popGrid"><img src="../images/en/section7/cir-8-marketing.png"></a>
		</li>
		<li class="fadeHov"><span class="frame"></span><a href="#" class="popGrid"><img src="../images/en/section7/cir-6-research.png"></a>
		</li>
		<li class="squareBtn fadeHov"><span class="frame"></span>
			<a href="javascript:section.goTo(9);"><img src="../images/en/section7/text-global-network.png"></a>
		</li>
	</ul>

</div></div>
     <div class="baseBLK BLK8"><span class="BLKbg" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -100px;" data-bottom-top="background-position: 50% 100px;"></span>

<div class="column2 globalNetwork clearfix">

<div class="leftCol sepCol">
	
<div class="infoBox">
      <h2 class="title opening"><img src="../images/en/section8/title_global_network.png"></h2>

      <h3 class="hlText">
	<img src="../images/en/section8/text_desc.png" class="fullWidth" id="GlobalNetworkSubTitleImage">
      </h3>

<div id="GlobalNetworkContent">

</div>
			<hr class="hrGrey">

	<h3>Find our office</h3>


     <ul class="netWorkTag">
     	<li><a href="javascript:headOffce(22.282151, 114.172075);">Head Office</a></li>
     	<li><a href="javascript:ChangeContinent(18.481201, 111.425780);">Asia</a></li>
     	<li><a href="javascript:ChangeContinent(-24.917852, 133.940503);">Australia</a></li>
     	<li><a href="javascript:ChangeContinent(55.804159, 15.320313);">Europe</a></li>
     	<li><a href="javascript:ChangeContinent(-1.731963, 23.679568);">Middle East and Africa</a></li>
     	<li><a href="javascript:ChangeContinent(0.069410, -62.220507);">Latin America</a></li>
		<li><a href="javascript:ChangeContinent(32.816688, -92.130193)">North America</a></li>
     </ul>

      <a class="linkArrowOrange" href="javascript:void();" id="GlobalNetworkOfficeFile" target="_blank">View all of our offices</a>

    </div>

</div>

<div id="map_canvas" class="rightCol sepCol" style="position: relative; background-color: rgb(229, 227, 223); overflow: hidden;">
	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14954209.37804006!2d95.63989154589844!3d23.78550604461135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sbn!2sbd!4v1438777171506" width="680" height="1000" frameborder="0" style="border:0" allowfullscreen></iframe>
</div> <!-- main map -->

</div></div>
     <div class="baseBLK BLK9">
	 
	<span data-bottom-top="background-position: 50% 100px;" data-top-bottom="background-position: 50% -100px;" data-center="background-position: 50% 0px;" class="BLKbg skrollable skrollable-between" style="background-position: 50% 44.9848px; background-image: url(&quot;http://aboutus.bditdc.com/img/cp.jpg&quot;);"></span>
<div class="contentInner">
	<div class="corpPublic">
		<h1 class="title"><img src="../images/en/section9/title_corp_public.png"></h1>
		<a class="circleMd fadeHov" target="_blank" href="#" id="AnnualPlanLink"><span class="frame"></span>
			<div class="tableCell">
				<img src="../images/en/section9/text_annual_plan.png">
			</div>
		</a>
		<div class="circleMd fadeHov cirTimeline"><span class="frame"></span>
			<div class="tableCell"><img src="../images/en/section9/text_annual-reports.png"/></div>

				<div class="timeline">

				        <a href="javascript:void();" class="navLeft jcarousel-control-prev"></a>
				        <a href="javascript:void();" class="navRight jcarousel-control-next"></a>

				    <div class="jcarousel-wrapper">
				        <!-- Carousel -->
				        <div class="jcarousel">

					<ul id="AnnualReports">
						<li><a href="http://info.bditdc.com/annualreport2013/" target="_blank">2012/13</a></li>
						<li><a href="http://info.bditdc.com/annualreport2012/" target="_blank">2011/12</a></li>
						<li><a href="http://info.bditdc.com/annualreport2011/" target="_blank">2010/11</a></li>
						<li><a href="javascript:void();">2009/10</a></li>
						<li><a href="javascript:void();">2008/09</a></li>
						<li><a href="javascript:void();">2007/08</a></li>
						<li><a href="javascript:void();">2006/07</a></li>
						<li><a href="javascript:void();">2005/06</a></li>
					</ul>
				        </div>

				    </div>

				</div>
	</div>
	<a class="circleMd fadeHov" target="_blank" href="#" id="CorporateBrochure"><span class="frame"></span><div class="tableCell"><img src="../images/en/section9/text_corp.png"/></div>
</a>

<a class="circleMd fadeHov" target="_blank" href="#" id="SMEMonthly" style="display:none;"><span class="frame"></span><div class="tableCell"><img src="../images/en/section9/text_sme.png"/></div>
</a>



			<div class="compSubscribe">				
				<a href="#" class="btnSubs">Bangladesh Means Business</a>
				<p>Click <a href="http://info.bditdc.com/enews_en/index.html" target="_blank">here</a> to subscribe our newsletter.<br>Asia market intelligence at your fingertips. </p>
			</div>

</div>
</div>
</div>
    <div class="baseBLK BLK10">
		<span data-bottom-top="background-position: 50% 100px;" data-top-bottom="background-position: 50% -100px;" data-center="background-position: 50% 0px;" class="BLKbg skrollable skrollable-between" style="background-position: 50% 40.4255px; background-image: url(&quot;http://aboutus.bditdc.com/img/career.jpg&quot;);">
		</span>

		<div class="career">
			<h1 class="titleTag"><img src="../images/en/section10/title_career.png"></h1>
			<div class="wrap">
				<div class="grid borderRight"><img src="../images/en/section10/title_opening.png"/>
					<span class="btm">
						<a class="linkArrowOrange fancybox" href="#popApp">Current openings</a>
					</span>
				</div>
				<div class="grid borderRight"><img src="../images/en/section10/title_exe.png"/>
					<span class="btm"><a class="linkArrowOrange" href="" target="_blank" id="ETSLink">More Details</a>
					</span>
				</div>
				<div class="grid"><img src="../images/en/section10/title_trade.png"/>
					<span class="btm"><a class="linkArrowOrange" href="" target="_blank" id="TAPLink">More Details</a>
					</span>
				</div>
			</div>
		</div>
	</div>
     <div class="baseBLK BLK11">
<div class="contact">
    <div class="wrap clearfix">
        <h2 class="title opening">
            <img src="../images/en/section11/title_contactus.png">
        </h2>
        <div id="ContactUsContent">
			<div class="col2">
				<h5>You can reach us by phone or email or in person</h5>
				<table border="0" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<td width="40%">
								<table border="0" cellpadding="0" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<th>By phone:</th>
											<td>880.174.399.8061</td>
										</tr>
										<tr>
											<th>By email:</th>
											<td>info@bditdc.com</td>
										</tr>
									</tbody>
								</table>
							</td>
							<td width="60%">
								<table border="0" cellpadding="0" cellspacing="0">
									<tbody>
										<tr>
											<th>In person</th>
										</tr>
										<tr>
											<td>
												Bditdc<br>
												Bangladesh Trade Development Council<br>
												House: 16, Road: 02, Sector: 07<br> 
												Uttara, Dhaka 1230<br>
												Saturday - Thursday 09:00 am - 5:00 pm<br>
												Closed on Friday and Public Holidays
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col">
				<h5>Follow Us</h5>
				<ul class="social">
					<li><a class="youtube" href="https://www.youtube.com/watch?v=j3lV36uEMR4" target="_blank">&nbsp;</a></li>
					<li><a class="facebook" href="https://www.facebook.com/bditdc" target="_blank">&nbsp;</a></li>
					<li><a class="googlePlus" href="https://plus.google.com/" target="_blank">&nbsp;</a></li>
					<li><a class="linkedIn" href="https://www.linkedin.com/profile/view?id=200897432&trk=hp-identity-photo" target="_blank">&nbsp;</a></li>
					<li><a class="toDou" href="http://zone.tudou.com/" target="_blank">&nbsp;</a></li>
					<li><a class="weiBo" href="http://weibo.com/" target="_blank">&nbsp;</a></li>
					<li><a class="twitter" href="https://twitter.com/" target="_blank">&nbsp;</a></li>
					<li><a class="weixin" href="javascript:void();"><span class="weixinHolder" style="display: none;"><img class="code" src="../images/bar-code.jpg"><span class="arrowArea">ID: Bditdcofficial</span></span></a></li>
				</ul>
				<div class="link">
					<a href="#" target="_blank">Register with Bditdc Databank</a> <a href="javascript:section.goTo(10);">Global Network</a> <a href="#" target="_blank">We welcome your feedback!</a>
				</div>
				<div class="logoShow">
					<img style="width:100px;" class="carOrg" src="../img/logo.png"/> 
				</div>
			</div>
			<p>&nbsp;</p>

        </div>
    </div>

</div>

<div class="footer">
    <div class="wrap">
        <table cellspacing="0" cellpadding="0" width="100%" border="0" class="tbFooter">
            <tbody>
                <tr>
                    <td align="middle">
                        <table cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr></tr>
                            </tbody>
                        </table>
                        <table align="center" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>
                                    <td class="padding_right_10px">
                                        <a id="ppe:footer:foot_link_newsletter" href="#" onclick="window.open('http://www.bditdc.com/enewsletter/enewsletter_subscription.htm?locale=en'); return false;" class="link_black_small" target="_blank">
                                            <span id="ppe:footer:lblNewsletter">Newsletter</span>
                                        </a>|</td>
                                    <td class="padding_right_10px">
                                        <a id="ppe:footer:foot_link_Rss" href="#" onclick="window.open('http://www.bditdc.com/info/rss/en/rss.html'); return false;" class="link_black_small" target="_blank">
                                            <span id="ppe:footer:lblRss">RSS Feeds</span>
                                        </a>|</td>
                                    <td class="padding_right_10px">
                                        <a id="ppe:footer:foot_link_mobile" href="#" onclick="window.open('http://info.bditdc.com/mobile'); return false;" class="link_black_small" target="_blank">
                                            <span id="ppe:footer:lblRss">Mobile Device</span>
                                        </a>|</td>
                                    <td class="padding_right_10px">
                                        <a id="ppe:footer_normal:footer_normal_form:lnkMobile" class="link_black_small" href="" target="_blank">
                                            <span id="ppe:footer_normal:footer_normal_form:lblMobile">Manage your e-subscription preferences</span>
                                        </a>|</td>
                                    <td><a class="link_black_small" href="http://www.bditdc.com/suppliers/china-wholesale-suppliers/en" target="_blank"> Suppliers</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr></tr>
                <tr>
                    <td align="middle">
                        <hr class="dot_line">
                    </td>
                </tr>
                <tr>
                    <td valign="center" align="middle" height="25">
                        <table cellspacing="0" cellpadding="0" border="0" align="center">
                            <tbody>
                                <tr>
                                    <td>Regional Websites</td>
                                    <td>
                                        <div id="imapfooter">
                                            <a href="#" onclick="javascript:window.open(''); return false;" id="pic1" class="lang" title="German" target="_blank"></a>
                                            <a href="#" onclick="javascript:window.open(''); return false;" id="pic2" class="lang" title="Spanish" target="_blank"></a>
                                            <a href="#" onclick="javascript:window.open(''); return false;" id="pic3" class="lang" title="French" target="_blank"></a>
                                            <a href="#" onclick="javascript:window.open(''); return false;" id="pic4" class="lang" title="Italian" target="_blank"></a>
                                            <a href="#" onclick="javascript:window.open(''); return false;" id="pic5" class="lang" title="Portuguese" target="_blank"></a>
                                            <a href="#" onclick="javascript:window.open(''); return false;" id="pic6" class="lang" title="Japanese" target="_blank"></a>
                                            <a href="#" onclick="javascript:window.open(''); return false;" id="pic7" class="lang" title="Korean" target="_blank"></a>
                                            <a href="#" onclick="javascript:window.open(''); return false;" id="pic8" class="lang" title="Russian" target="_blank"></a>
                                            <a href="#" onclick="javascript:window.open(''); return false;" id="pic9" class="lang" title="Arabic" target="_blank"></a>
                                            <a href="#" onclick="javascript:window.open(''); return false;" id="pic10" class="lang" title="Czech" target="_blank"></a>
                                            <a href="#" onclick="javascript:window.open(''); return false;" id="pic11" class="lang" title="Polski" target="_blank"></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="content_black_small" valign="center" align="center" height="25">
                        <a class="link_black_small" id="ppe:footer:lnkBDITDC" href="http://www.bditdc.com/" target="_blank">
                            <span id="ppe:footer:lblBDITDCcomHome">bditdc.com Home</span>
                        </a>|
                        <a class="link_black_small" id="ppe:footer:lblAboutBDITDC" href="">
                            <span id="ppe:footer:lblAboutBDITDC2">About BDITDC</span>
                        </a>|
                        <a class="link_black_small" id="ppe:footer:lblContactBDITDC" href="" target="_blank">
                            <span id="ppe:footer:lblContactBDITDC2">Contact BDITDC</span>
                        </a>|
                        <a class="link_black_small" id="ppe:footer:lblAdvertisewithBDITDC" href="" target="_blank">
                            <span id="ppe:footer:lblAdvertisewithBDITDC2">Advertise with BDITDC</span>
                        </a>|
                        <a class="link_black_small" id="ppe:footer:lblTermofUse" href="" target="_blank">
                            <span id="ppe:footer:lblTermofUse2">Terms of Use</span>
                        </a>|
                        <a class="link_black_small" id="ppe:footer:lblPrivacyStatement" href="" target="_blank">
                            <span id="ppe:footer:lblPrivacyStatement2">Privacy Statement</span>
                        </a>|
                        <a class="link_black_small" id="ppe:footer:lblHyperlinkPolicy" href="" target="_blank">
                            <span id="ppe:footer:lblHyperlinkPolicy2">Hyperlink Policy</span>
                        </a>|
                        <a class="link_black_small" id="ppe:footer:lblsiteMap" href="" target="_blank">
                            <span id="ppe:footer:lblsiteMap2">Site Map</span>
                        </a>
                       
                    </td>
                </tr>
                <tr>
                    <td align="middle">
                        <hr class="dot_line">
                    </td>
                </tr>
                <tr>
                    <td class="content_black_small" align="center">
                        <span id="ppe:footer:lblCopyRight">Copyright © 2000-2014 Bangladesh International Trade Development Council. All rights reserved.</span>
                    </td>
                </tr>
                <tr>
                    <td class="content_black_small" align="center">&nbsp;</td>
                </tr>
            </tbody>
        </table>

        <!--End: table -->

    </div>
</div>
</div>
   </div>
   <a href="javascript:section.goToNext();" class="nextSecBtn"></a> 
   
   <!-- START: popupcontent -->
   <div class="popupLayer"><!-- START: showcase -->
<div class="popup" id="showCasePop">

<div class="outer">
<a title="Close" class="closeBtn" href="javascript:;"></a>

    <h2><img src="../images/en/section2/explore/title_whatwedo_white.png"/></h2>
  <div class="info scrollPane popList">
<div id="showCaseContent">
</div>

  </div>

  </div>

</div>
<!-- END: showcase -->

<!-- START: explore and connect -->
<div class="popup" id="enhancePop">

<div class="outer">
<a title="Close" class="closeBtn" href="javascript:;"></a>

    <h2><img src="../images/en/section2/explore/title_whatwedo_white.png"/></h2>
  <div class="info scrollPane popList">
<div id="enhanceContent">

</div>

  </div>
    <!-- <a href="javascript:void();" class="detailBtn">DOWNLOAD DETAILS</a> -->
  </div>

</div>
<!-- END: explore and connect -->

<!-- START: explore and connect -->
<div class="popup" id="explorePop">

<div class="outer">
<a title="Close" class="closeBtn" href="javascript:;"></a>

    <h2><img src="../images/en/section2/explore/title_whatwedo_white.png"/></h2>

  <div class="info scrollPane popList">

<div id="exploreContent">

</div>
  </div>
    <!-- <a href="javascript:void();" class="detailBtn">DOWNLOAD DETAILS</a> -->
  </div>

</div>
<!-- END: explore and connect -->

<!-- START: post application -->
<div class="popup" id="popApp">

<div class="outer">
<!-- <a title="Close" class="closeBtn" href="javascript:;"></a> -->
    <h3><img src="../images/en/misc/title_post_apply.png"></h3>

<div class="info scrollPane">
  <div id="OpeningTnC">
  </div>
</div>


  <div class="btnWrap"><a href="https://ch.tbe.taleo.net/CH15/ats/careers/searchResults.jsp?org=BDITDC&amp;cws=1" class="choiceBtn" target="_blank" id="OpeningLink">ACCEPT</a>
    <a href="javascript:void();" class="choiceBtn closeBox" onClick="javascript:$.fancybox.close();">DECLINE</a>
  </div>

</div>

</div>
  <!-- END: post application -->

  <!-- START: concil popup -->


  <div class="concilInfo popup" id="concilInfo">
    <img src="#" class="iconPic">
    <div class="info ">
      <h1 class="name"><!-- Jack So Chak Kwong --></h1>
      <h2 class="title"><!-- GBS, OBE, JP: Chairman --></h2>
      <div class="intro scrollPane">
        <div class="textCtn">
        </div>
      </div>
    </div>
      <a href="javascript:void();" target="_blank" class="btnDownload"></a>
  </div>
  <!-- END: concil popup -->

  <!-- START: tubeplayer popup -->
  <div class="youtubeBox popup" id="youtubeBox" >
<div class="outer">

      <a title="Close" class="closeBtn" href="javascript:;"></a>
      <div class="player">
      <iframe width="604" height="340" src="#" frameborder="0" allowfullscreen id="youtubePlayer"></iframe>
    </div>
    <div class="listCtn scrollPane">
       <ul class="videoList">
      </ul>
    </div>


</div>

  </div>

  <!-- END: tubeplayer popup -->

  <!-- START: gallery popup -->
  <div id="galleryPop" class="popup">
    <div class="outer">
      <a title="Close" class="closeBtn" href="javascript:;"></a>

  <h2 id="albumTitle"></h2>
<div class="galleryCan">
  <a href="javascript:void();" id="galleryLink" target="_blank"><img id="imgBox"></a>
</div>
  <div id="caption">
    <a href="#" id="captionLink" target="_blank">

    </a>
  </div>
<div id="galleryNav" class="owl-carousel">

</div>

        <!-- Gallery Carousel end-->

      </div>
    </div>
    <!-- END: gallery popup-->


    <!-- map popup start -->

    <div class="mapPopInfo">

  <div class="content">
    <h4 class="data_region">TOKYO</h4>

    <div class="childMap" id="childMap">
    </div>

    <div class="locationInfo">
    <table>
      <tr>
        <td><h5 class="leader">
      <img src="../images/section8/location-icon/tokyo.png" class="data_thumb">
      <span class="main">
        <span class="data_name">Shigemi Furuta</span>
          <span class="title data_title">Director, Japan</span>
      </span>
    </h5></td>
      </tr>


      <tr>
        <td>&nbsp;</td>
      </tr>

      <tr>
        <td class="data_content">Content</td>
      </tr>
 
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table>
    </div>

      <a title="Close" class="mapPopClose" href="javascript:;"></a>

  </div>

</div>
</div>
    @stop