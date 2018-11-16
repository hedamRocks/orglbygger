<div class="plain-col full-width section-divider" style="background-image:url(assets/img/bg/fåborg.jpg);">
    
</div>
<div class="plain-col full-width content-container">
    <center>
    <div class="content-container-inner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <div class="plain-col full-width big-pad no-pad-top-bot">
                        <div class="plain-col full-width big-pad no-pad-top no-pad-left-right">
                            <h1>Kontakt</h1>
                            <blockquote>
                                <div class="stroke plain-col"></div>
                                +45 40 87 68 29
                            </blockquote>
                        </div><br><br>
                        <h3 class="bold">Orgelbygger Sven Hjorth Andersen</h3><br>
                        <p>
                            Lorem ipsum dolor amet leggings adaptogen banh mi, fashion axe vegan forage distillery meh. Put a bird on it activated charcoal af 90's, yuccie retro tote bag celiac scenester shabby chic fanny pack leggings knausgaard. Poke banjo helvetica, godard tbh keytar raclette enamel pin sustainable. Ethical vice poutine drinking vinegar, gastropub next level hammock marfa kickstarter blog williamsburg celiac. Viral everyday carry portland, irony cold-pressed marfa fanny pack knausgaard snackwave tumblr.
                        </p><br>
                        <h3 class="bold">Kontakt mig på:</h3><br>
                        <h4 class="bold">
                            - Tlf: <a class="darker-text bold" href="tel:+4540876829">+45 40 87 68 29</a> <br>
                            - E-mail: <a class="darker-text bold" href="mailto:hjorth@post11.tele.dk" target="_top">hjorth@post11.tele.dk</a> ©
                        </h4>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div id="contactForm" class="plain-col full-width" style="background:#2a2a2a;border-radius:10px; padding:25px;">
                        <h2 class="white-text bold">Skriv til mig</h2><br>
                        <div class="plain-col full-width small-pad no-pad-left-right">
                            <input id="contactName" class="form-control" type="text" name="name" placeholder="Navn" required="">
                        </div>
                        <div class="plain-col full-width small-pad no-pad-left-right">
                            <input id="contactEmail" class="form-control" type="email" name="email" placeholder="E-mail" required="">
                        </div>
                        <div class="plain-col full-width small-pad no-pad-left-right">
                            <input id="contactPhone" class="form-control" type="tel" name="phone" placeholder="Telefon" required="">
                        </div>
                        <div class="plain-col full-width small-pad no-pad-left-right">
                            <textarea id="contactMessage" class="form-control" name="message" required="" style="height:200px;"></textarea>
                        </div>
                        <div id="errMsg" class="plain-col full-width">
                        </div>
                        <div class="plain-col full-width small-pad no-pad-left-right">
                            <button id="sendBtn" class="l-btn full-width med-pad" style="background:#ff8585;border:0px;border-radius:5px;"><h3 class="white-text bold">Send besked</h3></button>
                        </div>
                    </div>
                    <div id="contactResponse" class="plain-col full-width" style="background:#2a2a2a;border-radius:10px; display:none; padding:25px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </center>
</div>
<script>
    function sendNew(){
        $('#contactName').removeClass('red-border').val("");
        $('#contactEmail').removeClass('red-border').val("");
        $('#contactPhone').removeClass('red-border').val("");
        $('#contactMessage').removeClass('red-border').val("");
        $('#contactForm').show();
        $('#contactResponse').hide().html('');
    }

    $('#contactName').keyup(function(){
        $(this).removeClass('red-border');
    });
    $('#contactEmail').keyup(function(){
        $(this).removeClass('red-border');
    });
    $('#contactPhone').keyup(function(){
        $(this).removeClass('red-border');
    });
    $('#contactMessage').keyup(function(){
        $(this).removeClass('red-border');
    });
    $('#sendBtn').click(function(){
        var name = $('#contactName').val();
        var email = $('#contactEmail').val();
        var phone = $('#contactPhone').val();
        var message = $('#contactMessage').val();

        var canSend = true;
        var errMsg = "<div class='plain-col full-width med-pad white-text' style='background:indianred;border:0px;border-radius:5px;'>";

        if(name.length == 0){
            canSend = false;
            errMsg += "- Navn skal udfyldes.<br>";
            $("#contactName").addClass('red-border');
        }

        if(email.length == 0){
            canSend = false;
            errMsg += "- E-mail skal udfyldes.<br>";
            $("#contactEmail").addClass('red-border');
        }else if (email.indexOf("@") == -1 || email.indexOf(".") == -1){
            canSend = false;
            errMsg += "- E-mail skal have det rette format (ex. eksempel@email.dk).<br>";
            $("#contactEmail").addClass('red-border');
        }

        if(phone.length == 0){
            canSend = false;
            errMsg += "- Telefonnummer skal udfyldes.<br>";
            $("#contactPhone").addClass('red-border');
        }else if (!/^\d+$/.test(phone)){
            canSend = false;
            errMsg += "- Telefonnummer må kun indeholde tal.<br>";
            $("#contactPhone").addClass('red-border');
        }if(phone.length != 8){
            canSend = false;
            errMsg += "- Telefonnummer har ikke den rette længde.<br>";
            $("#contactPhone").addClass('red-border');
        }

        if(message.length == 0){
            canSend = false;
            errMsg += "- Der er ikke blevet skrevet nogen besked.<br>";
            $("#contactMessage").addClass('red-border'); 
        }
        errMsg += "</div>";
        if(canSend){
            $.ajax({
                type: 'POST',
                url: 'backend/contact.php',
                data: { 
                    'name': name, 
                    'mail': email,
                    'phone' : phone,
                    'message' : message
                },
                success: function(msg){
                    $('#contactForm').hide();
                    $('#contactResponse').show().html(msg);
                }
            });
        }else{
            $('#errMsg').html(errMsg);
        }
    });
</script>