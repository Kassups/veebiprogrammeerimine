<?php
	class Photoupload{
		/*private $testPrivate;
		public $testPublic;*/
		private $tempFile;
		private $imageFileType;
		private $myTempImage;
		private $
		
		function __construct($tempFile, $imageFileType){
				/*$this->testPrivate = $x;
				$this->testPublic*/
				$this->tempFile = $tempFile;
				$this->imageFileType = $imageFileType;
			
			}
		private function createImage(){
			if($this->imageFileType == "jpg" or $this->FileType == "jpeg"){
				$myTempImage = imagecreatefromjpeg($this->tempFile);
				}
			if($this->FileType == "png"){
				$myTempImage = imagecreatefrompng($this->tempFile);
				}
			if($this->FileType == "gif"){
				$this->myTempImage = imagecreatefromgif($this->tempFile);
				}
			
		}	
			
		public function resizPhoto($maxWidth, $maxHeight){
			$this->createImage();
			//suuruse muutmine
			//teeme kindlaks praeguse suuruse
			$imageWidth = imagesx($this->myTempImage);
			$imageHeight = imagesy($this->myTempImage);
			//arvutan suuruse suhte
			if($imageWidth > $imageHeight){
				$sizeRatio = $imageWidth / $maxWidth;
			} else {
				$sizeRatio = $imageHeight / $maxHeight;
			}
			//tekitame uue, sobiva suurusega pikslikogumi
			$this->myImage = $this->resizeImage($this->myTempImage, $imageWidth, $imageHeight, round($imageWidth / $sizeRatio), round($imageHeight / $sizeRatio));
		}	
		private function resizeImage($image, $origW, $origH, $w, $h){
			$newImage = imagecreatetruecolor($w, $h);
			imagesavealpha ($newImage, true);
			$transColor = imagecolorallocatealpha ($newImage, 0,0,0,127);
			imagefill($newImage, 0, 0, $transColor);
			//kuhu, kust, kuhu koordinaatidele x ja y, kust koordinaatidelt x ja y, kui laialt uude kohta, kui kõrgelt uude kohta, kui laialt võtta, kui kõrgelt võtta
			imagecopyresampled($newImage, $image, 0, 0, 0, 0, $w, $h, $origW, $origH);
			return $newImage;
		}
			
		public function addWatermark($watermark,$marginHor, $marginVer){
			//lisan vesimärgi
				$stamp = imagecreatefrompng($watermark);
				$stampWidth = imagesx($stamp);
				$stampHeight = imagesy($stamp);
				$stampX = imagesx($this->myImage) - $stampWidth - $marginHor;
				$stampY = imagesy($this-> myImage) - $stampHeight - $marginVer;
				imagecopy($this->myImage, $stamp, $stampX, $stampY, 0, 0, $stampWidth, $stampHeight);
			
			
		}
		public function addTextWatermark($text){
			$textColor = imagecolorallocatealpha($this->myImage, 255,255,255,60);//alpha 0 - 127
				//mis pildile, suurus, nurk vastupäeva, x, y, värv, font, tekst
				imagettftext($this->myImage, 20, -45, 10, 25, $textColor, "../../graphics/ARIAL.TTF", $text);
			
			
		}
			
		} //class lõppeb
		
?>

