<?php
require __DIR__ . '/common.php';
$githubOAuth = new \Yurun\OAuthLogin\Github\OAuth2($GLOBALS['oauth_github']['appid'], $GLOBALS['oauth_github']['appkey'], $GLOBALS['oauth_github']['callbackUrl']);

// 可选属性
/*
// 是否在登录页显示注册
$githubOAuth->allowSignup = false;
*/
// 所有为null的可不传，这里为了演示和加注释就写了
$url = $githubOAuth->getAuthUrl(
	null,	// 回调地址，登录成功后返回该地址
	null,	// state 为空自动生成
	null	// scope 只要登录默认为空即可
);
$_SESSION['YURUN_GITHUB_STATE'] = $githubOAuth->state;
header('location:' . $url);