<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12/21/2021
 * Time: 8:51 PM
 */
return [


    'payment_system' => false,

    /*
     * Student can login to system
     *
     * */
    'student' => [
        /*
         * Login account
         * Email,Password
         * */
        'account' => false,
        /*
         * School name , year of graduation
         * */
        'school'=>false,
        /*
         * National Exam /KANKOR ID Number
         * */
        'national_exam'=>false,
        /*
         * Phone Number of student
         * */
        'contact'=>false,
        /*
         * Address of student
         * */
        'address'=>false,
        /*
         * father name,Grand father name,sex,date of birth
         * */
        'info'=>false,
        'image'=>false,
        ],
    'teacher' => [
        /*
         * Login account
         * Email,Password
         * */
        'account' => false,
        /*
         * School name , year of graduation
         * */
        'contact'=>false,
        /*
         * Address of student
         * */
        'address'=>false,
        /*
         * father name,,sex,date of birth,field,experience,salary
         * */
        'info'=>false,
        'image'=>false,
        ],
    'logo'=>[
      'first'=>['height'=>120,'width'=>250],
      'second'=>['height'=>120,'width'=>150]
    ],
    /*
     * This is for file and pdf logo
     * */
    'file'=>[
        'logo'=>true,
        'first'=>['height'=>3,'width'=>40,'x'=>2,'y'=>160],
        'second'=>['height'=>10,'width'=>30,'x'=>5,'y'=>10],
        'mode'=>'I'
        ],


];