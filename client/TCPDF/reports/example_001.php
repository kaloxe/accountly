<?php
require("/xampp/htdocs/accountly/server/session/session.php");
$report = $_SESSION['report'];
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 * @group header
 * @group footer
 * @group page
 * @group pdf
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Nicola Asuni');
$pdf->setTitle('TCPDF Example 001');
$pdf->setSubject('TCPDF Tutorial');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $report['title'], PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->setFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print
$html = '
<table cellpadding="2" cellspacing="2" border="1" style="text-align:center;">
	<thead>
		<tr bgcolor="#cccccc">
			<th>Usuario</th><th scope="col">Cuenta</th>
			<th>Saldo</th>
		</tr>
	</thead>
	<tbody id="content"><tr><td class="table-plus">admin</td><td scope="row" class="table-plus">Banesco</td><td>Bolivares -500<br>Dolar 200<br></td></tr><tr><td class="table-plus">admin</td><td scope="row" class="table-plus">Life</td><td>Bolivares 90<br></td></tr><tr><td class="table-plus">admin</td><td scope="row" class="table-plus">BCV </td><td>Bolivares 50<br></td></tr><tr><td class="table-plus">admin</td><td scope="row" class="table-plus">Bancaribe</td><td>Bolivares 150<br></td></tr><tr><td class="table-plus">admin</td><td scope="row" class="table-plus">Vida</td><td></td></tr><tr><td class="table-plus">profesor</td><td scope="row" class="table-plus">Mamasita</td><td>Bolivares -700<br></td></tr><tr><td class="table-plus">profesor</td><td scope="row" class="table-plus">Bancaribe</td><td>Bolivares 500<br>Dolar 200<br></td></tr><tr><th>Total</th><th></th><th>Bolivares -410<br>Dolar 400<br></th></tr></tbody>
</table>
<div id="chartTotal" style="min-height: 304.887px;"><div id="apexcharts3e6938" class="apexcharts-canvas apexcharts3e6938 apexcharts-theme-light" style="width: 429px; height: 304.887px;"><svg id="SvgjsSvg1976" width="429" height="304.88750000000005" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><foreignObject x="0" y="0" width="429" height="304.88750000000005"><div class="apexcharts-legend apexcharts-align-center position-right" xmlns="http://www.w3.org/1999/xhtml" style="position: absolute; left: auto; top: 20px; right: 5px;"><div class="apexcharts-legend-series" rel="1" data:collapsed="false" style="margin: 0px 5px;"><span class="apexcharts-legend-marker" rel="1" data:collapsed="false" style="background: rgb(0, 143, 251); color: rgb(0, 143, 251); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="1" i="0" data:default-text="Bancaribe" data:collapsed="false" style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Bancaribe</span></div><div class="apexcharts-legend-series" rel="2" data:collapsed="false" style="margin: 0px 5px;"><span class="apexcharts-legend-marker" rel="2" data:collapsed="false" style="background: rgb(0, 227, 150); color: rgb(0, 227, 150); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="2" i="1" data:default-text="Mamasita" data:collapsed="false" style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Mamasita</span></div><div class="apexcharts-legend-series" rel="3" data:collapsed="false" style="margin: 0px 5px;"><span class="apexcharts-legend-marker" rel="3" data:collapsed="false" style="background: rgb(254, 176, 25); color: rgb(254, 176, 25); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="3" i="2" data:default-text="Vida" data:collapsed="false" style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Vida</span></div><div class="apexcharts-legend-series" rel="4" data:collapsed="false" style="margin: 0px 5px;"><span class="apexcharts-legend-marker" rel="4" data:collapsed="false" style="background: rgb(255, 69, 96); color: rgb(255, 69, 96); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="4" i="3" data:default-text="Bancaribe" data:collapsed="false" style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Bancaribe</span></div><div class="apexcharts-legend-series" rel="5" data:collapsed="false" style="margin: 0px 5px;"><span class="apexcharts-legend-marker" rel="5" data:collapsed="false" style="background: rgb(119, 93, 208); color: rgb(119, 93, 208); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="5" i="4" data:default-text="BCV%20" data:collapsed="false" style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">BCV </span></div><div class="apexcharts-legend-series" rel="6" data:collapsed="false" style="margin: 0px 5px;"><span class="apexcharts-legend-marker" rel="6" data:collapsed="false" style="background: rgb(0, 143, 251); color: rgb(0, 143, 251); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="6" i="5" data:default-text="Life" data:collapsed="false" style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Life</span></div><div class="apexcharts-legend-series" rel="7" data:collapsed="false" style="margin: 0px 5px;"><span class="apexcharts-legend-marker" rel="7" data:collapsed="false" style="background: rgb(0, 227, 150); color: rgb(0, 227, 150); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="7" i="6" data:default-text="Banesco" data:collapsed="false" style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Banesco</span></div></div><style type="text/css">	
    	
      .apexcharts-legend {	
        display: flex;	
        overflow: auto;	
        padding: 0 10px;	
      }	
      .apexcharts-legend.position-bottom, .apexcharts-legend.position-top {	
        flex-wrap: wrap	
      }	
      .apexcharts-legend.position-right, .apexcharts-legend.position-left {	
        flex-direction: column;	
        bottom: 0;	
      }	
      .apexcharts-legend.position-bottom.apexcharts-align-left, .apexcharts-legend.position-top.apexcharts-align-left, .apexcharts-legend.position-right, .apexcharts-legend.position-left {	
        justify-content: flex-start;	
      }	
      .apexcharts-legend.position-bottom.apexcharts-align-center, .apexcharts-legend.position-top.apexcharts-align-center {	
        justify-content: center;  	
      }	
      .apexcharts-legend.position-bottom.apexcharts-align-right, .apexcharts-legend.position-top.apexcharts-align-right {	
        justify-content: flex-end;	
      }	
      .apexcharts-legend-series {	
        cursor: pointer;	
        line-height: normal;	
      }	
      .apexcharts-legend.position-bottom .apexcharts-legend-series, .apexcharts-legend.position-top .apexcharts-legend-series{	
        display: flex;	
        align-items: center;	
      }	
      .apexcharts-legend-text {	
        position: relative;	
        font-size: 14px;	
      }	
      .apexcharts-legend-text *, .apexcharts-legend-marker * {	
        pointer-events: none;	
      }	
      .apexcharts-legend-marker {	
        position: relative;	
        display: inline-block;	
        cursor: pointer;	
        margin-right: 3px;	
        border-style: solid;
      }	
      	
      .apexcharts-legend.apexcharts-align-right .apexcharts-legend-series, .apexcharts-legend.apexcharts-align-left .apexcharts-legend-series{	
        display: inline-block;	
      }	
      .apexcharts-legend-series.apexcharts-no-click {	
        cursor: auto;	
      }	
      .apexcharts-legend .apexcharts-hidden-zero-series, .apexcharts-legend .apexcharts-hidden-null-series {	
        display: none !important;	
      }	
      .apexcharts-inactive-legend {	
        opacity: 0.45;	
      }</style></foreignObject><g id="SvgjsG1978" class="apexcharts-inner apexcharts-graphical" transform="translate(22, 0)"><defs id="SvgjsDefs1977"><clipPath id="gridRectMask3e6938"><rect id="SvgjsRect1979" width="286.1875" height="304.1875" x="-3" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><clipPath id="gridRectMarkerMask3e6938"><rect id="SvgjsRect1980" width="282.1875" height="304.1875" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><filter id="SvgjsFilter1988" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%"><feFlood id="SvgjsFeFlood1989" flood-color="#000000" flood-opacity="0.45" result="SvgjsFeFlood1989Out" in="SourceGraphic"></feFlood><feComposite id="SvgjsFeComposite1990" in="SvgjsFeFlood1989Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite1990Out"></feComposite><feOffset id="SvgjsFeOffset1991" dx="1" dy="1" result="SvgjsFeOffset1991Out" in="SvgjsFeComposite1990Out"></feOffset><feGaussianBlur id="SvgjsFeGaussianBlur1992" stdDeviation="1 " result="SvgjsFeGaussianBlur1992Out" in="SvgjsFeOffset1991Out"></feGaussianBlur><feMerge id="SvgjsFeMerge1993" result="SvgjsFeMerge1993Out" in="SourceGraphic"><feMergeNode id="SvgjsFeMergeNode1994" in="SvgjsFeGaussianBlur1992Out"></feMergeNode><feMergeNode id="SvgjsFeMergeNode1995" in="[object Arguments]"></feMergeNode></feMerge><feBlend id="SvgjsFeBlend1996" in="SourceGraphic" in2="SvgjsFeMerge1993Out" mode="normal" result="SvgjsFeBlend1996Out"></feBlend></filter><filter id="SvgjsFilter2010" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%"><feFlood id="SvgjsFeFlood2011" flood-color="#000000" flood-opacity="0.45" result="SvgjsFeFlood2011Out" in="SourceGraphic"></feFlood><feComposite id="SvgjsFeComposite2012" in="SvgjsFeFlood2011Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite2012Out"></feComposite><feOffset id="SvgjsFeOffset2013" dx="1" dy="1" result="SvgjsFeOffset2013Out" in="SvgjsFeComposite2012Out"></feOffset><feGaussianBlur id="SvgjsFeGaussianBlur2014" stdDeviation="1 " result="SvgjsFeGaussianBlur2014Out" in="SvgjsFeOffset2013Out"></feGaussianBlur><feMerge id="SvgjsFeMerge2015" result="SvgjsFeMerge2015Out" in="SourceGraphic"><feMergeNode id="SvgjsFeMergeNode2016" in="SvgjsFeGaussianBlur2014Out"></feMergeNode><feMergeNode id="SvgjsFeMergeNode2017" in="[object Arguments]"></feMergeNode></feMerge><feBlend id="SvgjsFeBlend2018" in="SourceGraphic" in2="SvgjsFeMerge2015Out" mode="normal" result="SvgjsFeBlend2018Out"></feBlend></filter></defs><g id="SvgjsG1982" class="apexcharts-pie"><g id="SvgjsG1983" transform="translate(0, 0) scale(1)"><g id="SvgjsG1984" class="apexcharts-slices"><g id="SvgjsG1985" class="apexcharts-series apexcharts-pie-series" seriesName="Bancaribe" rel="1" data:realIndex="0"><path id="SvgjsPath1986" d="M 140.09375 9.68521341463412 A 141.40853658536588 141.40853658536588 0 1 1 114.81653311703121 290.2247549049676 L 140.09375 151.09375 L 140.09375 9.68521341463412" fill="rgba(0,143,251,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-pie-slice-0" index="0" j="0" data:angle="190.2971409038748" data:startAngle="0" data:strokeWidth="2" data:value="216.5" data:pathOrig="M 140.09375 9.68521341463412 A 141.40853658536588 141.40853658536588 0 1 1 114.81653311703121 290.2247549049676 L 140.09375 151.09375 L 140.09375 9.68521341463412" stroke="#ffffff"></path></g><g id="SvgjsG1997" class="apexcharts-series apexcharts-pie-series" seriesName="Mamasita" rel="2" data:realIndex="1"><path id="SvgjsPath1998" d="M 114.81653311703121 290.2247549049676 A 141.40853658536588 141.40853658536588 0 0 1 114.81653311703121 290.2247549049676 L 140.09375 151.09375 L 114.81653311703121 290.2247549049676" fill="rgba(0,227,150,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-pie-slice-1" index="0" j="1" data:angle="0" data:startAngle="190.2971409038748" data:strokeWidth="2" data:value="-23.1" data:pathOrig="M 114.81653311703121 290.2247549049676 A 141.40853658536588 141.40853658536588 0 0 1 114.81653311703121 290.2247549049676 L 140.09375 151.09375 L 114.81653311703121 290.2247549049676" stroke="#ffffff"></path></g><g id="SvgjsG1999" class="apexcharts-series apexcharts-pie-series" seriesName="Vida" rel="3" data:realIndex="2"><path id="SvgjsPath2000" d="M 114.81653311703121 290.2247549049676 A 141.40853658536588 141.40853658536588 0 0 1 114.81653311703121 290.2247549049676 L 140.09375 151.09375 L 114.81653311703121 290.2247549049676" fill="rgba(254,176,25,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-pie-slice-2" index="0" j="2" data:angle="0" data:startAngle="190.2971409038748" data:strokeWidth="2" data:value="0" data:pathOrig="M 114.81653311703121 290.2247549049676 A 141.40853658536588 141.40853658536588 0 0 1 114.81653311703121 290.2247549049676 L 140.09375 151.09375 L 114.81653311703121 290.2247549049676" stroke="#ffffff"></path></g><g id="SvgjsG2001" class="apexcharts-series apexcharts-pie-series" seriesName="Bancaribe" rel="4" data:realIndex="3"><path id="SvgjsPath2002" d="M 114.81653311703121 290.2247549049676 A 141.40853658536588 141.40853658536588 0 0 1 104.33425401322478 287.9061495330342 L 140.09375 151.09375 L 114.81653311703121 290.2247549049676" fill="rgba(255,69,96,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-pie-slice-3" index="0" j="3" data:angle="4.3509046072710476" data:startAngle="190.2971409038748" data:strokeWidth="2" data:value="4.95" data:pathOrig="M 114.81653311703121 290.2247549049676 A 141.40853658536588 141.40853658536588 0 0 1 104.33425401322478 287.9061495330342 L 140.09375 151.09375 L 114.81653311703121 290.2247549049676" stroke="#ffffff"></path></g><g id="SvgjsG2003" class="apexcharts-series apexcharts-pie-series" seriesName="BCVx" rel="5" data:realIndex="4"><path id="SvgjsPath2004" d="M 104.33425401322478 287.9061495330342 A 141.40853658536588 141.40853658536588 0 0 1 100.88301027717239 286.9572554369032 L 140.09375 151.09375 L 104.33425401322478 287.9061495330342" fill="rgba(119,93,208,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-pie-slice-4" index="0" j="4" data:angle="1.4503015357570064" data:startAngle="194.64804551114585" data:strokeWidth="2" data:value="1.65" data:pathOrig="M 104.33425401322478 287.9061495330342 A 141.40853658536588 141.40853658536588 0 0 1 100.88301027717239 286.9572554369032 L 140.09375 151.09375 L 104.33425401322478 287.9061495330342" stroke="#ffffff"></path></g><g id="SvgjsG2005" class="apexcharts-series apexcharts-pie-series" seriesName="Life" rel="6" data:realIndex="5"><path id="SvgjsPath2006" d="M 100.88301027717239 286.9572554369032 A 141.40853658536588 141.40853658536588 0 0 1 94.73555451681891 285.03033320908554 L 140.09375 151.09375 L 100.88301027717239 286.9572554369032" fill="rgba(0,143,251,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-pie-slice-5" index="0" j="5" data:angle="2.610542764362634" data:startAngle="196.09834704690286" data:strokeWidth="2" data:value="2.97" data:pathOrig="M 100.88301027717239 286.9572554369032 A 141.40853658536588 141.40853658536588 0 0 1 94.73555451681891 285.03033320908554 L 140.09375 151.09375 L 100.88301027717239 286.9572554369032" stroke="#ffffff"></path></g><g id="SvgjsG2007" class="apexcharts-series apexcharts-pie-series" seriesName="Banesco" rel="7" data:realIndex="6"><path id="SvgjsPath2008" d="M 94.73555451681891 285.03033320908554 A 141.40853658536588 141.40853658536588 0 0 1 140.06906955458686 9.68521556840929 L 140.09375 151.09375 L 94.73555451681891 285.03033320908554" fill="rgba(0,227,150,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-pie-slice-6" index="0" j="6" data:angle="161.2911101887345" data:startAngle="198.7088898112655" data:strokeWidth="2" data:value="183.5" data:pathOrig="M 94.73555451681891 285.03033320908554 A 141.40853658536588 141.40853658536588 0 0 1 140.06906955458686 9.68521556840929 L 140.09375 151.09375 L 94.73555451681891 285.03033320908554" stroke="#ffffff"></path></g><text id="SvgjsText1987" font-family="Helvetica, Arial, sans-serif" x="252.76415217054713" y="161.24559589247778" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="600" fill="#ffffff" class="apexcharts-text apexcharts-pie-label" filter="url(#SvgjsFilter1988)" style="font-family: Helvetica, Arial, sans-serif;">56.0%</text><text id="SvgjsText2009" font-family="Helvetica, Arial, sans-serif" x="28.471314339700044" y="132.70594541218568" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="600" fill="#ffffff" class="apexcharts-text apexcharts-pie-label" filter="url(#SvgjsFilter2010)" style="font-family: Helvetica, Arial, sans-serif;">47.5%</text></g></g></g><line id="SvgjsLine2019" x1="0" y1="0" x2="280.1875" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine2020" x1="0" y1="0" x2="280.1875" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line></g></svg><div class="apexcharts-tooltip apexcharts-theme-dark" style="left: 41.2969px; top: 85px;"><div class="apexcharts-tooltip-series-group apexcharts-active" style="display: flex; background-color: rgb(0, 227, 150);"><span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 227, 150); display: none;"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label">Banesco: </span><span class="apexcharts-tooltip-text-value">183.5</span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="display: none; background-color: rgb(0, 227, 150);"><span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 227, 150); display: none;"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label">Banesco: </span><span class="apexcharts-tooltip-text-value">183.5</span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="display: none; background-color: rgb(0, 227, 150);"><span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 227, 150); display: none;"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label">Banesco: </span><span class="apexcharts-tooltip-text-value">183.5</span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="display: none; background-color: rgb(0, 227, 150);"><span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 227, 150); display: none;"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label">Banesco: </span><span class="apexcharts-tooltip-text-value">183.5</span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="display: none; background-color: rgb(0, 227, 150);"><span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 227, 150); display: none;"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label">Banesco: </span><span class="apexcharts-tooltip-text-value">183.5</span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="display: none; background-color: rgb(0, 227, 150);"><span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 227, 150); display: none;"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label">Banesco: </span><span class="apexcharts-tooltip-text-value">183.5</span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="display: none; background-color: rgb(0, 227, 150);"><span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 227, 150); display: none;"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label">Banesco: </span><span class="apexcharts-tooltip-text-value">183.5</span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div></div></div>
';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
