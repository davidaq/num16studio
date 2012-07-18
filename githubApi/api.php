<?php
class GithubApi{
	private $curl;
	public function GithubApi($login){	//$login should be: username:password
		$this->curl=curl_init();
		curl_setopt($this->curl,CURLOPT_USERPWD,$login);
		curl_setopt($this->curl,CURLOPT_FOLLOWLOCATION,true);
		curl_setopt($this->curl,CURLOPT_RETURNTRANSFER,true);
	}
	private function exec($url)
	{
		curl_setopt($this->curl,CURLOPT_URL,$this->url($url));
		$ret=curl_exec($this->curl);
		curl_close($this->curl);
		return $ret;
	}
	private function url($url)
	{
		return 'https://api.github.com/'.$url;
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