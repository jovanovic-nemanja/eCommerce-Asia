function callButtonClick(inBtnName){
  if (!(typeof console === "undefined" || typeof console.log === "undefined")) {
    console.log('callButtonClick: ' + inBtnName);
  }
  //ButtonClick
  dcsMultiTrack('DCS.dcsuri','/virtual/aboutbditdc/button.htm','WT.ti','AboutBDITDC: '+inBtnName,'WT.prdclick','1','WT.y','y','DCSext.cg_bditdc_category','','DCSext.cg_section','','DCSext.cg_subsection','','DCSext.cg_language','');
}

function callEndlessScrolling(inUrl, inPageTitle, inSectionName, inLang){
  switch(inLang)  {
    case "EN":
        inLang = "English";
        break;
        
    case "SC":
        inLang = "Simplified Chinese";
        break;    
        
    case "TC":
        inLang = "Traditional Chinese";
        break;
        
    default:
        inLang = "English";
        break;
  }
  
  //EndlessScrolling
  if (!(typeof inSectionName === "undefined") && (inSectionName != "")){
    if (!(typeof console === "undefined" || typeof console.log === "undefined")) {
        console.log("callEndlessScrolling: inUrl=" + inUrl + ", inPageTitle=" + inPageTitle + ", inSectionName=" + inSectionName + ", inLang=" +inLang);
    }
    
    dcsMultiTrack('DCS.dcsuri',inUrl,'WT.ti',inPageTitle,'WT.prdclick','0','WT.y','y','DCSext.cg_bditdc_category','Mis','DCSext.cg_section','About%20BDITDC','DCSext.cg_subsection',inSectionName,'DCSext.cg_language',inLang);
  }
}

function callMultiWebTrend(inBtnName, inUrl, inPageTitle, inSectionName, inLang){
  if (!(typeof console === "undefined" || typeof console.log === "undefined")) {
    console.log("callEndlessScrolling: inBtnName=" + inBtnName + ", inUrl=" + inUrl + ", inPageTitle=" + inPageTitle + ", inSectionName=" + inSectionName + ", inLang="+inLang);
  }
  
  //ButtonClick
  //callButtonClick(inBtnName);
  
  //EndlessScrolling
  //callEndlessScrolling(inUrl, inPageTitle, inSectionName, inLang);
}

jQuery(document).ready(function($) {
    
  //Webtrend
  $.getJSON("/json/en/jWebtrendConf.json", function(data) {
      //code for IE window.location.origin undefined
      if (!window.location.origin) {
            window.location.origin = window.location.protocol + "//" + window.location.hostname + (window.location.port ? ':' + window.location.port: '');
        }
      var currentUrl = window.location.href.replace(window.location.origin, "");
      var currentLang = currentUrl.split('/')[1];
      $.each(data.WebtrendConf, function(index, val) {
        val.BtnName = val.BtnName.replace('BTN ', ('BTN '+ currentLang.toUpperCase()+' '))
        
        switch(val.ID){
          case 1:  //Homepage circle button of "Explore and Connect"
            $('.BLK1').find('.BLKoneBubbles').find("li").eq(0).on('click', {inBtnName: val.BtnName}, function(event){callButtonClick(event.data.inBtnName);}); //circle btn
            $('.BLK1').find('.article.explore').find("a.linkArrow").on('click', {inBtnName: val.BtnName}, function(event){callButtonClick(event.data.inBtnName);}); //more details            
            break;
          
          case 2:  //Homepage circle button of "Showcasing Hong Kong Services"
            $('.BLK1').find('.BLKoneBubbles').find("li").eq(1).on('click', {inBtnName: val.BtnName}, function(event){callButtonClick(event.data.inBtnName);});//circle btn
            $('.BLK1').find('.article.showcase').find("a.linkArrow").on('click', {inBtnName: val.BtnName}, function(event){callButtonClick(event.data.inBtnName);}); //more details
            break;
            
          case 3:  //Homepage circle button of "Enhancing HK SME's Capabilities"
            $('.BLK1').find('.BLKoneBubbles').find("li").eq(2).on('click', {inBtnName: val.BtnName}, function(event){callButtonClick(event.data.inBtnName);});//circle btn
            $('.BLK1').find('.article.enhance').find("a.linkArrow").on('click', {inBtnName: val.BtnName}, function(event){callButtonClick(event.data.inBtnName);}); //more details
            break;
            
          case 4:  //The Overview button in the page of Explore and Connect	
            $('.explore').find('.infoBox').find('.whatWeDo').find('a.overview').on('click', {inBtnName: val.BtnName}, function(event){callButtonClick(event.data.inBtnName);});
            break;  
          
          case 5:  //The Overview button in the page of Enhancing HK SMEs' Capabilities
            $('.enhancing').find('.infoBox').find('.whatWeDo').find('a.overview').on('click', {inBtnName: val.BtnName}, function(event){callButtonClick(event.data.inBtnName);});
            break;  
            
          case 6:  //The click action for the video thumbnail + Video title + More videos link
            $('.videoInfo').find('a.thumb.showVideoBox.mvLink').on('click', {inBtnName: val.BtnName}, function(event){callButtonClick(event.data.inBtnName);});//Master Video image
            $('.videoInfo').find('.content').find('.tag').find('a.mvLink').on('click', {inBtnName: val.BtnName}, function(event){callButtonClick(event.data.inBtnName);});//Master video title
            $('.videoInfo').find('.content').find('a.linkArrow.showVideoBox').on('click', {inBtnName: val.BtnName}, function(event){callButtonClick(event.data.inBtnName);});//More Videos
            break;  
           
          case 7:  //The total click of the Gallery buttons
            $('#galleryTag.galleryTag').find('li').on('click', {inBtnName: val.BtnName}, function(event){callButtonClick(event.data.inBtnName);});
            break;
            
          case 8:  //The link of Jacky So Bio in The Council page	
            $('.gridList').find('.highlight').find('a.concilPop').on('click', {inBtnName: val.BtnName}, function(event){callButtonClick(event.data.inBtnName);});
            $('.concilInfo.popup').find('a.btnDownload').on('click', {inBtnName: val.BtnName}, function(event){callButtonClick(event.data.inBtnName);}); //download link
            
            break;
          
          case 9:  //The ciricle button of Exhibitions in Corporate Structure
            $('.corpCir').find('.fadeHov').eq(0).find('a').on('click', {inBtnName: val.BtnName}, function(event){callButtonClick(event.data.inBtnName);});
            break;
            
          case 10:  //The ciricle button of Publications and E-Commerce in Corporate Structure
            $('.corpCir').find('.fadeHov').eq(3).find('a').on('click', {inBtnName: val.BtnName}, function(event){callButtonClick(event.data.inBtnName);});
            break;
            
          case 11:  //The ciricle button of Product Promotion in Corporate Structure
            $('.corpCir').find('.fadeHov').eq(2).find('a').on('click', {inBtnName: val.BtnName}, function(event){callButtonClick(event.data.inBtnName);});
            break;
            
          case 12:  //The ciricle button of Service Promotion in Corporate Structure
            $('.corpCir').find('.fadeHov').eq(4).find('a').on('click', {inBtnName: val.BtnName}, function(event){callButtonClick(event.data.inBtnName);});
            break;
          
          case 13:  //The ciricle button of International & Mainland Relations in Corporate Structure	
            $('.corpCir').find('.fadeHov').eq(1).find('a').on('click', {inBtnName: val.BtnName}, function(event){callButtonClick(event.data.inBtnName);});
            break;
          
          case 14:  //The ciricle button of Research in Corporate Structure
            $('.corpCir').find('.fadeHov').eq(8).find('a').on('click', {inBtnName: val.BtnName}, function(event){callButtonClick(event.data.inBtnName);});
            break;
          
          case 15:  //BTN Corporate Structure - Corporate Communications	
            $('.corpCir').find('.fadeHov').eq(5).find('a').on('click', {inBtnName: val.BtnName}, function(event){callButtonClick(event.data.inBtnName);});
            break;
            
          case 16:  //The ciricle button of Marketing and Customer Service in Corporate Structure	
            $('.corpCir').find('.fadeHov').eq(6).find('a').on('click', {inBtnName: val.BtnName}, function(event){callButtonClick(event.data.inBtnName);});
            break;
            
          case 17:  //The ciricle button of Media and Public Affairs in Corporate Structure
            $('.corpCir').find('.fadeHov').eq(7).find('a').on('click', {inBtnName: val.BtnName}, function(event){callButtonClick(event.data.inBtnName);});
            break;
            
          case 18:  //The Global Network button in Corporate Structure page
            $('.squareBtn.fadeHov').find('a').on('click', {inBtnName: val.BtnName}, function(event){callButtonClick(event.data.inBtnName);});
            break;
            
          case 19:  //Footer Youtube Button	
            $('.social').find('.youtube').on('click', {inBtnName: val.BtnName}, function(event){callButtonClick(event.data.inBtnName);});
            break;
            
          case 20:  //Footer Facebook Button	
            $('.social').find('.facebook').on('click', {inBtnName: val.BtnName}, function(event){callButtonClick(event.data.inBtnName);});
            break
            
          case 21:  //Footer Google Plus Button	
            $('.social').find('.googlePlus').on('click', {inBtnName: val.BtnName}, function(event){callButtonClick(event.data.inBtnName);});
            break
            
          case 22:  //Footer Linkenin Button	
            $('.social').find('.linkedIn').on('click', {inBtnName: val.BtnName}, function(event){callButtonClick(event.data.inBtnName);});
            break
            
          case 23:  //Footer Tudou Button	
            $('.social').find('.toDou').on('click', {inBtnName: val.BtnName}, function(event){callButtonClick(event.data.inBtnName);});
            break
            
          case 24:  //BTN Weibo	
            $('.social').find('.weiBo').on('click', {inBtnName: val.BtnName}, function(event){callButtonClick(event.data.inBtnName);});
            break
            
          case 25:  //BTN Twitter	
            $('.social').find('.twitter').on('click', {inBtnName: val.BtnName}, function(event){callButtonClick(event.data.inBtnName);});
            break
          
          default:
            break;
        }
      });
  });
});