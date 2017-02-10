<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
Hi {{$content['receiver']->username}},<br/><br/>

The following profile member has seen your profile and {{($content['sender']->gender == 'Male')? 'he':'she'}} has sent an request to you <br/><br/>

<b>Username : </b> {{$content['sender']->username}}<br/> 
<b>Profile ID : </b> <a href="{{asset(App::getLocale().'/profile/'.$content['sender']->rand_id)}}">{{$content['sender']->rand_id}}</a><br/><br/>

Thanks,<br/>
Matrimony.com
</body>
</html>