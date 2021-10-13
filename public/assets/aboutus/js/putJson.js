var lang = 'en';

jQuery(document).ready(function($) {
    lang = $('body').attr('lang');

	// side Menu
    $.getJSON("/json/"+lang+"/jMenu.json", function(data) {
    	//data.PromotionArea[0].Thumbnail
    		$('.funcList .events .thumb').attr('src', data.PromotionArea[0].Thumbnail);
    		$('.funcList .events .link').attr('href', data.PromotionArea[0].Url);
    		$('.funcList .events h5').text(data.PromotionArea[0].Title);

    		$('.funcList .videos .thumb').attr('src', data.PromotionArea[1].Thumbnail);
    		$('.funcList .videos .link').attr('href', data.PromotionArea[1].Url);
    		$('.funcList .videos h5').text(data.PromotionArea[1].Title);

            $('.funcList .media .thumb').attr('src', data.PromotionArea[2].Thumbnail);
            $('.funcList .media .link').attr('href', data.PromotionArea[2].Url);
            $('.funcList .media h5').text(data.PromotionArea[2].Title);

            $('.funcList .business .thumb').attr('src', data.PromotionArea[3].Thumbnail);
            $('.funcList .business .link').attr('href', data.PromotionArea[3].Url);
            $('.funcList .business h5').text(data.PromotionArea[3].Title);
    });
    // side Menu end

    //blk 1 Home
    $.getJSON("/json/"+lang+"/jHomePage.json", function(data){
        //console.log (data);
        $('.BLK1 .BLKbg').css('backgroundImage', 'url('+data.HomeVideo[0].CoverImage+')');

        $('.article.showcase').find('h1').html(data.KeyMessage[0].Title);
        $('.article.showcase').find('.desc').html(data.KeyMessage[0].Content);

        $('.article.explore').find('h1').html(data.KeyMessage[1].Title);
        $('.article.explore').find('.desc').html(data.KeyMessage[1].Content);

        $('.article.enhance').find('h1').html(data.KeyMessage[2].Title);
        $('.article.enhance').find('.desc').html(data.KeyMessage[2].Content);
        
    });
    //blk 1 Home end

    //blk 2 Our work
    $.getJSON("/json/"+lang+"/jOurWork.json", function(data){
        //console.log (data);
        /*
        $('.showcase .BLKbg').css('backgroundImage', 'url('+data.OurWork[0].BGImage+')');
        $('.explore .BLKbg').css('backgroundImage', 'url('+data.OurWork[1].BGImage+')');
        $('.enhancing .BLKbg').css('backgroundImage', 'url('+data.OurWork[2].BGImage+')');
        */
        
        $('.showcase .BLKbg').css('backgroundImage', 'url(\u0027'+data.OurWork[0].BGImage+'\u0027)');
        $('.explore .BLKbg').css('backgroundImage', 'url(\u0027'+data.OurWork[1].BGImage+'\u0027)');
        $('.enhancing .BLKbg').css('backgroundImage', 'url(\u0027'+data.OurWork[2].BGImage+'\u0027)');

        
        //showcase
         $('.showcase .intro').html(data.OurWork[0].Content);

         $('#mvTitle').text(data.MasterVideo[0]);
         $('#mvTitle').attr('href', 'javascript:getVideoItem('+data.MasterVideo[2]+');');
         $('.mvLink').attr('href', 'javascript:getVideoItem('+data.MasterVideo[2]+');');
         $('#mvImg').attr('src', data.MasterVideo[4]);

         $('<div class="subList"><p class="btn-video videoCat2"><a href=""></a></p><p class="btn-video videoCat3"><a href=""></a></p><p class="btn-ebook catBook"><a href=""></a></p></div>').insertAfter('.videoInfo');
         
        
         $('.videoCat2 a').html(data.VideoList2rdTitle)
            .attr('href', 'javascript:getVideoItem('+data.List2FirstVideoID+', 1);');
         $('.videoCat3 a').html(data.VideoList3thTitle)
            .attr('href', 'javascript:getVideoItem('+data.List3FirstVideoID+', 2);');

         var $videoBox = $('.youtubeBox .videoList');

         $('li', $videoBox).each(function(index, el) {
             if($(this).attr('id')==data.List2FirstVideoID){
                $('<div class="subTit"><span>'+data.VideoList2rdTitle+'</span></div>').insertBefore($(this));
                $(this).css('border-top-width',0);
             }
             if($(this).attr('id')==data.List3FirstVideoID){
                $('<div class="subTit"><span>'+data.VideoList3thTitle+'</span></div>').insertBefore($(this));
                $(this).css('border-top-width',0);
             }
         });


         $('.catBook a').html(data.EBookTitle).attr({'href': data.EBookPath, 'target': '_blank'});

        //explore
         $('.explore .intro').html(data.OurWork[1].Content);

         //quoteTag

         //Comment by GT 12/Nov/2014
         //var quoteArray = data.Quotes;
         //console.log (quoteArray.length);
         //var quote = quoteArray[Math.floor(Math.random()*quoteArray.length)];
         //console.log(quote);
         //$('#quoteImg').attr('src', quote.Thumbnails);
         //var quoteText = quote.Content;
         //$('#quoteText').html(quoteText);
        //Comment by GT 12/Nov/2014- End

         var listCtn = '';
         $.each(data.TagsEAC, function(index, val) {
            var aid = this.ID;
            var tag = this.Title;
            var url = (this.Url != null ? this.Url : 'javascript:void();');
            var content = this.Content;
            listCtn+='<li aid="'+aid+'"><a href="'+url+'" target="_blank">'+tag+'</a>';
            if (content != null){
                listCtn+='<div class="detailBox">'+content+'</div>';
            }
            listCtn+='</li>';
         });

         $('.explore .listTbl').html(listCtn);


        //enhance
         $('.enhancing  .intro').html(data.OurWork[2].Content);

         var listCtn = '';
         $.each(data.TagsESC, function(index, val) {
            var aid = this.ID;
            var tag = this.Title;
            var url = (this.Url != null ? this.Url : 'javascript:void();');
            var content = this.Content;
            listCtn+='<li aid="'+aid+'"><a href="'+url+'" target="_blank">'+tag+'</a>';
            if (content != null){
                listCtn+='<div class="detailBox">'+content+'</div>';
            }
            listCtn+='</li>';
         });

         $('.enhancing  .listTbl').html(listCtn);

         showBox();

         $('#showCaseContent').html(data.OurWork[0].ContentOverView);
         $('#exploreContent').html(data.OurWork[1].ContentOverView);
         $('#enhanceContent').html(data.OurWork[2].ContentOverView);

         $('.scrollPane').jScrollPane();
    });
    //blk 2 Our work end

    //blk 3 our mission
    $.getJSON("/json/"+lang+"/jOurMission.json", function(data){
        $('.BLK3 .BLKbg').css('backgroundImage', 'url('+data.OurMissionBGImage+')');
        $('.BLK3 #ourmission').html(data.OurMissionContent);
    });
    //blk 3 our mission end


    //blk 4 the council
    $.getJSON("/json/"+lang+"/jTheCouncil.json", function(data){
        //console.log(data);
        $('.BLK4 .BLKbg').css('backgroundImage', 'url('+data.TheCouncilBGImage+')');
         $('.BLK4 #theCouncil').html(data.TheCouncilContent);

        $('#concilInfo .name').html(data.ChairmanProfile.Name);
        $('#concilInfo .title').html(data.ChairmanProfile.Title);
         $('#concilInfo .textCtn').html(data.ChairmanProfile.Content);
         $('#concilInfo .iconPic').attr('src', data.ChairmanProfile.ImagePath);
        $('#concilInfo .btnDownload').attr('href', data.ChairmanProfile.ProfileFile);

        $('.scrollPane').jScrollPane();


    });
    //blk 4 the council end

    //blk 5 the team
    $.getJSON("/json/"+lang+"/jTheTeam.json", function(data){
        //console.log(data);
        $('.BLK5 .BLKbg').css('backgroundImage', 'url('+data.TheTeamBGImage+')');
    });
    //blk 5 the team end

    //blk 7 copt structure
    $.getJSON("/json/"+lang+"/jCorporateStructure.json", function(data) {
        $('.BLK7 .BLKbg').css('backgroundImage', 'url('+data.CorporateStructureBGImage+')');

            $.each(data.OrganizationCharts, function(index, val) {
                $('.BLK7 .corpCir > .fadeHov').eq(index).find('.popGrid').attr('href', this.Chart);
            });
    });
    //blk 7 copt structure end

    //blk 9 Corp Public
    $.getJSON("/json/"+lang+"/jCorporatePublications.json", function(data) {
        //console.log (data);
        $('.BLK9 .BLKbg').css('backgroundImage', 'url('+data.CorporatePublicationsBGImage+')');
        $('#AnnualPlanLink').attr('href',data.AnnualPlanLink);
        $('#SMEMonthly').attr('href',data.SMEMonthly);
        $('#CorporateBrochure').attr('href',data.CorporateBrochure);
        $('#CorporateBrochure').attr('href',data.CorporateBrochure);
        $('.btnSubs').attr({'href': data.SubscribeHKMB, 'target': '_blank'});

        var content = new String();
        var reports = data.AnnualReports;

        $.each(reports, function(index, val) {
            //console.log(this);
            content += '<li><a href="'+this.RptPath+'" target="_blank">'+this.RptName+'</a></li>';
        });
        $('#AnnualReports').html(content);

        //hide nav if item is <= 3
        //console.log (reports.length);
        if (reports.length <= 3){
            $('.timeline .navLeft, .timeline .navRight').hide();
        }

        timeline();

    });
    //blk 9 Corp Public end

    //blk 10 career
    $.getJSON("/json/"+lang+"/jCareer.json", function(data) {
        //console.log (data);
        $('.BLK10 .BLKbg').css('backgroundImage', 'url('+data.CareerBGImage+')');
        $('#OpeningTnC').html(data.OpeningTnC);
        $('#OpeningLink').attr('href',data.OpeningLink);
        $('#ETSLink').attr('href',data.ETSLink);
        $('#TAPLink').attr('href',data.TAPLink);
    });
    //blk 10 career end

    //blk 11 contact us
    $.getJSON("/json/"+lang+"/jContactUs.json", function(data) {
        $('#ContactUsContent').html(data.ContactUsContent);
        weiBoCode();
    });

    general();
    //blk 11 contact us end
    

});