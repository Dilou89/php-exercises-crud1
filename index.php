<?php 

$connect=mysqli_connect('localhost','root','root','colyseum')or die("probleme de connection");

$client=mysqli_query($connect,"SELECT *FROM clients" );
While($data=mysqli_fetch_assoc($client)){
	echo $data['lastName']." ";
	echo $data['firstName']."-----";

}
?>
<hr>
<?php
$show=mysqli_query($connect,"SELECT *FROM showTypes");
While($data=mysqli_fetch_assoc($show)){
	echo $data['id']." ";
	echo $data['type']."----"."</br>";
}
?>
<hr>
<?php

echo "TOP 20 clients";
$top20=mysqli_query($connect,"SELECT *FROM clients WHERE id <=20 ");
While($data=mysqli_fetch_assoc($top20)){
	echo $data['lastName']." ";
	echo $data['firstName']."</br>";
}
?>
<hr>
<?php

echo "clients avec carte fidelité   :"."</br>";
$CF=mysqli_query($connect,'SELECT clients.lastName FROM clients JOIN cards ON cards.cardNumber=clients.cardNumber WHERE cards.cardTypesId=1');
While($data=mysqli_fetch_assoc($CF)){
	echo $data['lastName']."</br>";

}
?>
<hr>
<?php
echo "clients nom commençant par M   :"."</br>";
$M=mysqli_query($connect,"SELECT *FROM clients WHERE lastName LIKE 'm%' ORDER BY lastName ASC");
While($data=mysqli_fetch_assoc($M)){
	echo "Nom :".$data['lastName']."</br>"."Prénom : ".$data['firstName']."</br>"."</br>";
};
?>
<hr>
<?php
$show = $connect->query('SELECT *FROM shows  ORDER BY title ASC');
While($data=mysqli_fetch_assoc($show)){
	echo "Spectacle :".$data['title']."</br>"."artiste: ".$data['performer']. "date :" .$data['date']."heure : ".$data['startTime']."</br>"."</br>";
};

?>
<hr>
<?php
$clientCF = $connect->query('SELECT * FROM clients LEFT OUTER JOIN cards ON cards.cardNumber=clients.cardNumber') ;
While($data=mysqli_fetch_assoc($clientCF)){
	if($data['cardTypesId']!=1){
		echo "Nom :".$data['lastName']."</br>"."Prenom: ".$data['firstName']."</br>". "Date de naissance :" .$data['birthDate']."</br>";
		echo "Carte de fidélité : non".'<br/>';}

		else{

			echo "Carte de fidélité : oui    Numéro de card: ". $data['cardNumber']."<br/>";
		}



	};