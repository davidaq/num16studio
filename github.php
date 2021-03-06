<?php
class GithubApi{
	private $login;
	public function GithubApi($login=NULL){
		$this->login=is_null($login)?'':$login.'@';
	}
	private function exec($url)
	{
		$f=@file($this->url($url));
		if($f){
			return implode('',$f);
		}else
			return NULL;
	}
	private function url($url)
	{
		return 'https://'.$this->login.'api.github.com/'.$url;
	}
	public function repos($user=NULL)
	{
		if(is_null($user))
		{
			return $this->exec('user/repos');
		}
		return $this->exec('users/'.$user.'/repos');
	}
	public function repo($repo)
	{
		return $this->exec('repos/'.$repo);
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
		}else if(isset($ret['message'])&&$ret['message']=='Not Found')
			return NULL;
		else
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