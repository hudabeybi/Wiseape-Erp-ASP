<?php
/*
* This file is generated using SoondaCodeGenerator Pluggin for Soonda Application Builder Code Generator.
* Don't modify this file directly.
* This file may be replaced during re-code generation, any changes to this file may be replaced.
* Instead, Create new file and class that inherits this class to add functionality and modification.
*/

/***********************************************************************
* 
* 	File Name: tables.php
* 	Created Date: 6/7/2017 1:49:54 AM
* 
* **********************************************************************/



class gallery extends SoondaData
{
	//var properties

	var $IdGallery;

	var $GalleryCaption;

	var $ImageDate;

	var $ImageUrl;

	var $GalleryAlbumId;

	function __construct()
	{
	}//end of constructor


	protected function _get_IdGallery()
	{
		return $this->IdGallery;
	}

	protected function _set_IdGallery($value)
	{
		$this->IdGallery = $value;
	}


	protected function _get_GalleryCaption()
	{
		return $this->GalleryCaption;
	}

	protected function _set_GalleryCaption($value)
	{
		$this->GalleryCaption = $value;
	}


	protected function _get_ImageDate()
	{
		return $this->ImageDate;
	}

	protected function _set_ImageDate($value)
	{
		$this->ImageDate = $value;
	}


	protected function _get_ImageUrl()
	{
		return $this->ImageUrl;
	}

	protected function _set_ImageUrl($value)
	{
		$this->ImageUrl = $value;
	}


	protected function _get_GalleryAlbumId()
	{
		return $this->GalleryAlbumId;
	}

	protected function _set_GalleryAlbumId($value)
	{
		$this->GalleryAlbumId = $value;
	}


}



class galleryalbum extends SoondaData
{
	//var properties

	var $IdGalleryAlbum;

	var $AlbumTitle;

	var $AlbumDescription;

	var $AlbumCreatedDate;

	var $AlbumImage;

	var $Tag;

	function __construct()
	{
	}//end of constructor


	protected function _get_IdGalleryAlbum()
	{
		return $this->IdGalleryAlbum;
	}

	protected function _set_IdGalleryAlbum($value)
	{
		$this->IdGalleryAlbum = $value;
	}


	protected function _get_AlbumTitle()
	{
		return $this->AlbumTitle;
	}

	protected function _set_AlbumTitle($value)
	{
		$this->AlbumTitle = $value;
	}


	protected function _get_AlbumDescription()
	{
		return $this->AlbumDescription;
	}

	protected function _set_AlbumDescription($value)
	{
		$this->AlbumDescription = $value;
	}


	protected function _get_AlbumCreatedDate()
	{
		return $this->AlbumCreatedDate;
	}

	protected function _set_AlbumCreatedDate($value)
	{
		$this->AlbumCreatedDate = $value;
	}


}



class gender extends SoondaData
{
	//var properties

	var $IdGender;

	var $GenderName;

	var $GenderInfo;

	function __construct()
	{
	}//end of constructor


	protected function _get_IdGender()
	{
		return $this->IdGender;
	}

	protected function _set_IdGender($value)
	{
		$this->IdGender = $value;
	}


	protected function _get_GenderName()
	{
		return $this->GenderName;
	}

	protected function _set_GenderName($value)
	{
		$this->GenderName = $value;
	}


	protected function _get_GenderInfo()
	{
		return $this->GenderInfo;
	}

	protected function _set_GenderInfo($value)
	{
		$this->GenderInfo = $value;
	}


}



class post extends SoondaData
{
	//var properties

	var $IdPost;

	var $PostTitle;

	var $PostSubTitle;

	var $PostDate;

	var $PostShortText;

	var $PostText;

	var $PostMainImage;

	var $PostedById;

	var $PostTag;

	var $IsActive;

	function __construct()
	{
	}//end of constructor


	protected function _get_IdPost()
	{
		return $this->IdPost;
	}

	protected function _set_IdPost($value)
	{
		$this->IdPost = $value;
	}


	protected function _get_PostTitle()
	{
		return $this->PostTitle;
	}

	protected function _set_PostTitle($value)
	{
		$this->PostTitle = $value;
	}


	protected function _get_PostSubTitle()
	{
		return $this->PostSubTitle;
	}

	protected function _set_PostSubTitle($value)
	{
		$this->PostSubTitle = $value;
	}


	protected function _get_PostDate()
	{
		return $this->PostDate;
	}

	protected function _set_PostDate($value)
	{
		$this->PostDate = $value;
	}


	protected function _get_PostShortText()
	{
		return $this->PostShortText;
	}

	protected function _set_PostShortText($value)
	{
		$this->PostShortText = $value;
	}


	protected function _get_PostText()
	{
		return $this->PostText;
	}

	protected function _set_PostText($value)
	{
		$this->PostText = $value;
	}


	protected function _get_PostMainImage()
	{
		return $this->PostMainImage;
	}

	protected function _set_PostMainImage($value)
	{
		$this->PostMainImage = $value;
	}


	protected function _get_PostedById()
	{
		return $this->PostedById;
	}

	protected function _set_PostedById($value)
	{
		$this->PostedById = $value;
	}


	protected function _get_PostTag()
	{
		return $this->PostTag;
	}

	protected function _set_PostTag($value)
	{
		$this->PostTag = $value;
	}


	protected function _get_IsActive()
	{
		return $this->IsActive;
	}

	protected function _set_IsActive($value)
	{
		$this->IsActive = $value;
	}


}



class user extends SoondaData
{
	//var properties

	var $IdUser;

	var $FirstName;

	var $LastName;

	var $UserPicture;

	var $UserRegisteredDate;

	var $GenderId;

	var $UserEmail;

	var $UserPhone;

	var $UserGroupId;

	function __construct()
	{
	}//end of constructor


	protected function _get_IdUser()
	{
		return $this->IdUser;
	}

	protected function _set_IdUser($value)
	{
		$this->IdUser = $value;
	}


	protected function _get_FirstName()
	{
		return $this->FirstName;
	}

	protected function _set_FirstName($value)
	{
		$this->FirstName = $value;
	}


	protected function _get_LastName()
	{
		return $this->LastName;
	}

	protected function _set_LastName($value)
	{
		$this->LastName = $value;
	}


	protected function _get_UserPicture()
	{
		return $this->UserPicture;
	}

	protected function _set_UserPicture($value)
	{
		$this->UserPicture = $value;
	}


	protected function _get_UserRegisteredDate()
	{
		return $this->UserRegisteredDate;
	}

	protected function _set_UserRegisteredDate($value)
	{
		$this->UserRegisteredDate = $value;
	}


	protected function _get_GenderId()
	{
		return $this->GenderId;
	}

	protected function _set_GenderId($value)
	{
		$this->GenderId = $value;
	}


	protected function _get_UserEmail()
	{
		return $this->UserEmail;
	}

	protected function _set_UserEmail($value)
	{
		$this->UserEmail = $value;
	}


	protected function _get_UserPhone()
	{
		return $this->UserPhone;
	}

	protected function _set_UserPhone($value)
	{
		$this->UserPhone = $value;
	}


	protected function _get_UserGroupId()
	{
		return $this->UserGroupId;
	}

	protected function _set_UserGroupId($value)
	{
		$this->UserGroupId = $value;
	}


}



class usergroup extends SoondaData
{
	//var properties

	var $IdUserGroup;

	var $UserGroup;

	var $UserGroupDesc;

	function __construct()
	{
	}//end of constructor


	protected function _get_IdUserGroup()
	{
		return $this->IdUserGroup;
	}

	protected function _set_IdUserGroup($value)
	{
		$this->IdUserGroup = $value;
	}


	protected function _get_UserGroup()
	{
		return $this->UserGroup;
	}

	protected function _set_UserGroup($value)
	{
		$this->UserGroup = $value;
	}


	protected function _get_UserGroupDesc()
	{
		return $this->UserGroupDesc;
	}

	protected function _set_UserGroupDesc($value)
	{
		$this->UserGroupDesc = $value;
	}


}


?>