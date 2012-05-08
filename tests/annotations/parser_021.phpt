--TEST--
Complex Annotations in class test
--FILE--

<?php

<Entity("users")>
class User
{
    <Column("integer")>
    <Id>
    <GeneratedValue("AUTO")>
    protected $id;

    <ManyToMany("Phonenumber")>
    <JoinTable(
        "users_phonenumbers",
        array(
            <JoinColumn("user_id", "id")>
		),
        array(
            <JoinColumn("phonenumber_id", "id", true)>
		)
    )>
    function foo() {}
}

$user = new User();

echo 'OK!';

?>
--EXPECT--
OK!
