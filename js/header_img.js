function image(){
	rdmimg=new Array();
	rdmimg[0]="http://kt-kiyoshi.com/wp/wp-content/themes/wp.vicuna.exc/style-mono/images/eyecatch/image1_900.png";
	rdmimg[1]="http://kt-kiyoshi.com/wp/wp-content/themes/wp.vicuna.exc/style-mono/images/eyecatch/image2_900.png";
	rdmimg[2]="http://kt-kiyoshi.com/wp/wp-content/themes/wp.vicuna.exc/style-mono/images/eyecatch/image3_900.png";
	rdmimg[3]="http://kt-kiyoshi.com/wp/wp-content/themes/wp.vicuna.exc/style-mono/images/eyecatch/image4_900.png";
	rdmimg[4]="http://kt-kiyoshi.com/wp/wp-content/themes/wp.vicuna.exc/style-mono/images/eyecatch/image5_900.png";
	rdmimg[5]="http://kt-kiyoshi.com/wp/wp-content/themes/wp.vicuna.exc/style-mono/images/eyecatch/image6_900.png";
	rdmhead=Math.floor(rdmimg.length*Math.random());
	rdmimg=rdmimg[Math.floor(rdmhead)];
	document.write ('<style type="text/css">body div#header div.top_img a{background:url('+rdmimg+') top center no-repeat;}</style>');
}
