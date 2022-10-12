<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
</head>
<style>
	*{
		margin: 0px;
		padding: 0px;
	}
	body {
		text-align: center;
		width: 100vw;
		height: 100vh;
		background: #EBF0F5;
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
	}
	h1 {
		color: #88B04B;
		font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
		font-weight: 900;
		font-size: 40px;
		margin-bottom: 10px;
	}
	p {
		color: #404F5E;
		font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
		font-size:20px;
		margin: 0;
	}
	i {
		color: #9ABC66;
		font-size: 100px;
		line-height: 200px;
		margin-left:-15px;
	}
	.card {
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
		width: 50rem;
		height: 30rem;
		background: white;
		box-shadow: 0 2px 3px #C8D0D8;
		/*padding: 60px;
		border-radius: 4px;
		display: inline-block;
		margin: 0 auto;*/
	}
	code{
		background: black;
		color: yellow;
		font-size: 16px;
		font-weight: 600;
		padding: 7px 10px;
		border-radius: 10px;
		text-transform: capitalize;
	}
	.msg_box{
		    color: tomato;
    font-weight: bolder;
    font-size: 17px;
    margin-bottom: 2rem;
    text-transform: uppercase;
	}
</style>
<body>
	<div class="card">
		<p class="msg_box">System execute your code, please wait</p>
		<div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
			<i class="checkmark">✓</i>
		</div>
		<h1>😮 Wooh</h1> 
		<p style="margin-top: 0.5rem;"><code>{{$code}}</code> was successfully executed !</p>
	</div>
</body>
</html>