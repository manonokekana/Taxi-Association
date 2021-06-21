<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Taxi Association</title>
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
        <link type='text/css' rel='stylesheet' href='css/styles.css'/>
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark" style="background-color:grey;padding-left:4%;padding-right: 4%;">
            <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target" style="color:white">
                <span class="navbar-toggler-icon"></span>
            </button>
            <img src="images/logo.PNG" alt="logo" width="100"/>
            <div class="collapse navbar-collapse" id="collapse_target">
                <ul class="navbar-nav w-100 justify-content-end padd">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#home">HOME?</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="text-align: center;padding-top: 5%;">
                    <form id="assesment_form" action="libraries/marks.php" method="post" required>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <table style="text-align: left">
                                    <tr>
                                        <td colspan="2">1. How well do you know about the town?</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="one" value="0"></td>
                                        <td>A. Not good</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="one" value="1"></td>
                                        <td>B. Moderate</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="one" value="2"></td>
                                        <td>C. Good</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="one" value="3"></td>
                                        <td>D. Very good</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">2. How patient type of person are you?</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="two" value="0"></td>
                                        <td>A. Not good</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="two" value="1"></td>
                                        <td>B. Moderate</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="two" value="2"></td>
                                        <td>C. Good</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="two" value="3"></td>
                                        <td>D. Very good</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">3. Have you ever missed work?</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" value="0" name="three"></td>
                                        <td>A. Yes</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" value="1" name="three"></td>
                                        <td>B. No</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">4. How good is your driving record?</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" value="0" name="four"></td>
                                        <td>A. Not good</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" value="1" name="four"></td>
                                        <td>B. Moderate</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" value="2" name="four"></td>
                                        <td>C. Good</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" value="3" name="four"></td>
                                        <td>D. Very good</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">5. Why did you choose to become a taxi driver?</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="five" value="1"></td>
                                        <td>A. Passion</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="five" value="0"></td>
                                        <td>B. Poverty/Situation</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="five" value="0"></td>
                                        <td>C. The love of money</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">6. What are your views on a responsible taxi driver?</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="six" value="1"></td>
                                        <td>A. Be friendly and have customer care</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="six" value="0"></td>
                                        <td>B. Be serious so that customers cannot take advantage of you</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <table style="text-align: left">
                                    <tr>
                                        <td colspan="2">7. How do you deal with an angry passenger?</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="seven" value="1"></td>
                                        <td>A. Leave them alone</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="seven" value="0"></td>
                                        <td>B. Fight them</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">8. If a customer was angry at you because you took a wrong a turn, how would you manage the situation?</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="eight" value="0"></td>
                                        <td>A. Leave them alone</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="eight" value="0"></td>
                                        <td>B. Fight them</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="eight" value="1"></td>
                                        <td>C. Go back and make the right turn</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">9. How do you manage time well?</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="nine" value="0"></td>
                                        <td>A. Not good</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="nine" value="1"></td>
                                        <td>B. Moderate</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="nine" value="2"></td>
                                        <td>C. Good</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="nine" value="3"></td>
                                        <td>D. Very Good</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">10. If a customer was screaming at you because you made a wrong turn, how would you handle the situation?</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="ten" value="0"</td>
                                        <td>Scream back</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="ten" value="1"></td>
                                        <td>Leave them alone</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">11. Haver you ever been in a car accident while on the job?</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="eleven" value="1"></td>
                                        <td>No</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="eleven" value="0"></td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><input type="text" class="form-control" placeholder="Whose Fault?"</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <table style="text-align: left">
                                    <tr>
                                        <td colspan="2">12. How many passengers can a traditional taxi legally carry?</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="one" value="0"></td>
                                        <td>A. 10&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="one" value="1"></td>
                                        <td>B. 15&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="one" value="0"></td>
                                        <td>C. 22&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="one" value="0"></td>
                                        <td>D. 18&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">13. As a licensed taxi driver applying for hire, do you have to wear a seatbelt?</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="thirteen" value="1"></td>
                                        <td>A. Yes all the time</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="thirteen" value="0"></td>
                                        <td>B. Not at all</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="thirteen" value="0"></td>
                                        <td>C. Only when reversing</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="thirteen" value="0"></td>
                                        <td>D. Only when carrying passengers</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">14. Can taxis use a bus lane?</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="fourteen" value="1"></td>
                                        <td>A. Never</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="fourteen" value="0"></td>
                                        <td>B. Yes, but should check with local authority first</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="fourteen" value="0"></td>
                                        <td>C. Only on weekends</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="fourteen" value="0"></td>
                                        <td>D. Only when you are carrying passengers</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">15. Are you allowed to smoke in a taxi?</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="fifteen" value="0"></td>
                                        <td>A. Yes with open windows</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="fifteen" value="1"></td>
                                        <td>B. No it's illegal</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="fifteen" value="0"></td>
                                        <td>C. You can't smoke, but passengers can</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="fifteen" value="0"></td>
                                        <td>D. Yes you can only smoke e-cigarettes/vapes</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">When should a taxi driver take a break from driving?</td>
                                    </tr>
                                    <tr>
                                        <td><input type='radio' name='sixteen' value="3"></td>
                                        <td>A. After 1 hour of driving</td>
                                    </tr>
                                    <tr>
                                        <td><input type='radio' name='sixteen' value="2"></td>
                                        <td>B. After 2 hours of driving</td>
                                    </tr>
                                    <tr>
                                        <td><input type='radio' name='sixteen' value="1"></td>
                                        <td>C. After 5 hours of driving</td>
                                    </tr>
                                    <tr>
                                        <td><input type='radio' name='sixteen' value="0"></td>
                                        <td>D. After 10 hours of driving</td>
                                    </tr>
                                </table>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4" style="padding: 3%">
                                <input type="submit" class="btn-primary btn-lg" value="Submit" name="submit">
                                <input type="reset" class="btn-primary btn-lg" value="Cancel" name="reset">
                            </div>
                        </div>
                    </form><br><br>
                </div>
            </div>
        </div>
    </body>
</html>
