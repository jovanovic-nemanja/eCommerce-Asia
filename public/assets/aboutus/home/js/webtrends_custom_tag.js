/***************************************************************/
/* Created by BDITDC dated on 20/05/2014 and modified at 20/05/2014 				
/***************************************************************/

function WT_QueryParameter(){
	this.category="";
	this.section="";
	this.subsection="";
	this.language="";
	this.ssouid="";				
}


WT_QueryParameter.prototype.dcsAddExt=function(path,category,section){
	
	this.dcsSetCategory(category);
	this.dcsSetSection(section);
	if (((new RegExp(/.*\/en\/.*/)).test(path)) || ((new RegExp(/.*locale=en.*/)).test(path)) || ((new RegExp(/.*language=en.*/)).test(path)) || ((new RegExp(/.*-en\/.*/)).test(path)) ){
		this.dcsSetLanguage("English");			
	}
	else if (((new RegExp(/.*\/tc\/.*/)).test(path)) || ((new RegExp(/.*locale=zh_tw.*/)).test(path)) || ((new RegExp(/.*language=b5.*/)).test(path)) || ((new RegExp(/.*language=tc.*/)).test(path)) || ((new RegExp(/.*-tc\/.*/)).test(path)) ){
		this.dcsSetLanguage("Traditional Chinese");			
	}
	else if (((new RegExp(/.*\/sc\/.*/)).test(path)) || ((new RegExp(/.*locale=zh_cn.*/)).test(path)) || ((new RegExp(/.*language=gb.*/)).test(path)) || ((new RegExp(/.*language=sc.*/)).test(path)) || ((new RegExp(/.*-sc\/.*/)).test(path))){
		this.dcsSetLanguage("Simplified Chinese");	
	}	
	else
	{	
		this.dcsSetLanguage("English");			
	}
	
}

WT_QueryParameter.prototype.dcsClear=function(){
	this.category="";
	this.section="";
	this.subsection="";
	this.language="";
	this.ssouid="";			
}

	
WT_QueryParameter.prototype.dcsSetCategory=function(category){
        this.category = category;	
}

WT_QueryParameter.prototype.dcsSetSection=function(section){
        this.section = section;
}

WT_QueryParameter.prototype.dcsSetSubSection=function(subsection){
        this.subsection = subsection;
}

WT_QueryParameter.prototype.dcsSetLanguage=function(language){
        this.language= language;
}

WT_QueryParameter.prototype.dcsSetSSOUID=function(ssouid){
        this.ssouid = ssouid;	
}

WT_QueryParameter.prototype.dcsGetCookie=function(check_name){
	// first we'll split this cookie up into name/value pairs
	// note: document.cookie only returns name=value, not the other components
	var a_all_cookies = document.cookie.split( ';' );
	var a_temp_cookie = '';
	var cookie_name = '';
	var cookie_value = '';
	var i = '';
	
	for ( i = 0; i < a_all_cookies.length; i++ )
	{
		// now we'll split apart each name=value pair
		a_temp_cookie = a_all_cookies[i].split( '=' );
		
		
		// and trim left/right whitespace while we're at it
		cookie_name = a_temp_cookie[0].replace(/^\s+|\s+$/g, '');
	
		// if the extracted name matches passed check_name
		if ( cookie_name == check_name )
		{
			// we need to handle case where cookie has no value but exists (no = sign, that is):
			if ( a_temp_cookie.length > 1 )
			{
				cookie_value = unescape( a_temp_cookie[1].replace(/^\s+|\s+$/g, '') );
			}
			// note that in cases where cookie is initialized but no value, null is returned
			return cookie_value;
			break;
		}
		a_temp_cookie = null;
		cookie_name = '';
	}

}

WT_QueryParameter.prototype.dcsFindCookie=function(check_name){
	var a_all_cookies = document.cookie.split( ';' );
	var a_temp_cookie = '';
	var cookie_name = '';
	var b_cookie_found = false; // set boolean t/f default f
	var i = '';
	
	for ( i = 0; i < a_all_cookies.length; i++ )
	{
		a_temp_cookie = a_all_cookies[i].split( '=' );
		cookie_name = a_temp_cookie[0].replace(/^\s+|\s+$/g, '');
		if ( cookie_name == check_name )
		{
			b_cookie_found = true;
			break;
		}
		a_temp_cookie = null;
		cookie_name = '';
	}
	return b_cookie_found;
	}


WT_QueryParameter.prototype.dcsSetData=function(){
	var path = window.location.pathname.toLowerCase() + window.location.search.toLowerCase();
	var hostname = window.location.hostname.toLowerCase();

	/*******************************************************************/
	/* Added by BDITDC dated on 20/05/2014 and modified at 20/05/2014   */				
	/*******************************************************************/
        this.dcsAddExt(path,"Mis", "About BDITDC" );		

	if  (this.dcsFindCookie("SSOUID"))
	{
		this.dcsSetSSOUID(this.dcsGetCookie("SSOUID"));
	}
	
	
	/****************************************************/

}
	