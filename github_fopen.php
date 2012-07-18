<?php
class GithubApi{
	private $login;
	public function GithubApi($login){	//$login should be: username:password
		$this->login=$login;
	}
	private function exec($url)
	{
		return implode('',file($this->url($url)));
	}
	private function url($url)
	{
		return 'https://'.$this->login.'@api.github.com/'.$url;
	}
	public function repos($user=NULL)
	{
		if(is_null($user))
		{
			return $this->exec('user/repos');
		}
		return $this->exec('users/'.$user.'/repos');
	}
	public function readme($repo)
	{
		$ret=json_decode($this->exec('repos/'.$repo.'/readme'),true);
		if($ret['encoding']=='base64')
		{
			return base64_decode($ret['content']);
		}
	}
	public function content($repo,$path='')
	{
		$ret=json_decode($this->exec('repos/'.$repo.'/contents/'.$path),true);
		if(isset($ret['encoding'])&&$ret['encoding']=='base64')
		{
			return base64_decode($ret['content']);
		}else
			return $ret;
	}
	public function downloadUrl($repo,$format='zip',$ref='master')
	{
		return 'https://github.com/'.$repo.'/'.$format.'ball/'.$ref;
	}
	public function downloads($repo)
	{
		return json_decode($this->exec('repos/'.$repo.'/downloads'),true);
	}
	public function watching($user=NULL)
	{
		if(is_null($user))
			return json_decode($this->exec('user/watched'));
		else
			return json_decode($this->exec('users/'.$user.'/watched'));
	}
}
?>