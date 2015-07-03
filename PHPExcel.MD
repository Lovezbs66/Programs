一 :  PHPExcel 生成Excel表单
```
<?php
require_once("./PHPExcel.php");
$objPHPExcel=new PHPExcel();
$objSheet=$objPHPExcel->getActiveSheet();
$objSheet->setTitle("demo");
$objSheet->setCellValue("A1","Name")->setCellValue("B1","sumGrade")->setCellValue("C1","sex");
$objSheet->setCellValue("A2","lovezbs")->setCellValue("B2","110")->setCellValue("c2","Femal");
$objSheet->setCellValue("A3","lovezbs")->setCellValue("B3","110")->setCellValue("c3","Femal");
$objWrite=PHPExcel_IOFactory::createWriter($objPHPExcel,"Excel2007");
$objWrite->save("./demo.xls");
?>
```


二 : PHPExcel读取Excel中的数据

```
<?php 
header("Content-Type:text/html;charset=utf-8");
$dir=dirname(__FILE__);//找到当前脚本所在路径
require $dir."/PHPExcel/IOFactory.php";//引入读取excel的类文件
$filename=$dir."/demo.xls";
$fileType=PHPExcel_IOFactory::identify($filename);//自动获取文件的类型提供给phpexcel用
$objReader=PHPExcel_IOFactory::createReader($fileType);//获取文件读取操作对象
$sheetName=array("demo","3年级");
$objReader->setLoadSheetsOnly($sheetName);//只加载指定的sheet
$objPHPExcel=$objReader->load($filename);//加载文件
/**$sheetCount=$objPHPExcel->getSheetCount();//获取excel文件里有多少个sheet
for($i=0;$i<$sheetCount;$i++){
	$data=$objPHPExcel->getSheet($i)->toArray();//读取每个sheet里的数据 全部放入到数组中
	print_r($data);
}**/
foreach($objPHPExcel->getWorksheetIterator() as $sheet){//循环取sheet
		foreach($sheet->getRowIterator() as $row){//逐行处理
				if($row->getRowIndex()<2){
					continue;
				}
				foreach($row->getCellIterator() as $cell){//逐列读取
						$data=$cell->getValue();//获取单元格数据
						echo $data." ";
				}
				echo '<br/>';
		}
		echo '<br/>';
}
exit;
?>
```

三 : 输出到浏览器 (下载文件)

```
<?php
require_once("./PHPExcel.php");
$objPHPExcel=new PHPExcel();
$objSheet=$objPHPExcel->getActiveSheet();
$objSheet->setTitle("demo");
$objSheet->setCellValue("A1","Name")->setCellValue("B1","sumGrade")->setCellValue("C1","sex");
$objSheet->setCellValue("A2","lovezbs")->setCellValue("B2","110")->setCellValue("c2","Femal");
$objSheet->setCellValue("A3","lovezbs")->setCellValue("B3","110")->setCellValue("c3","Femal");
$objWrite=PHPExcel_IOFactory::createWriter($objPHPExcel,"Excel2007");
// $objWrite->save("./demo.xls");

	browser_export('Excel5','browser_excel03.xls');//输出到浏览器
	$objWriter->save("php://output");


	function browser_export($type,$filename){
		if($type=="Excel5"){
				header('Content-Type: application/vnd.ms-excel');//告诉浏览器将要输出excel03文件
		}else{
				header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');//告诉浏览器数据excel07文件
		}
		header('Content-Disposition: attachment;filename="'.$filename.'"');//告诉浏览器将输出文件的名称
		header('Cache-Control: max-age=0');//禁止缓存
	}
?>
```
---
[资料1](http://www.phpxs.com/post/3005)
[资料2](http://www.jb51.net/article/38363.htm)


