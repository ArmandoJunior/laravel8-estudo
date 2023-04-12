<div>
    <p>
        Olá <strong>{{ $user->name }}</strong>, tudo bem? Espero de verdade que sim!
        <br><br>
        Sua inscrição no evento <strong>{{ $event->title }}</strong> foi realizada com sucesso!
        <br>
        Muito obrigado por sua inscrição!
    </p>
    <hr>
    Email enviado em {{ date('d/m/y H:i') }} por Event's System
</div>

