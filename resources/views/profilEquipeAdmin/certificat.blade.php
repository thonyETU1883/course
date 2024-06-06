
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ ltrim(public_path('assets/css/pdf.css'), '/') }}" />
    <title>Document</title>
</head>
<body>
<div class="certificate-container">
    <div class="certificate">
        <div class="water-mark-overlay"></div>
        <div class="certificate-header">
            <img src="" class="logo" alt="">
        </div>
        <div class="certificate-body">
           
            <h1>Certificate of Completion</h1>
            <div class="certificate-content">
                <div class="about-certificate">
                    <p>
                        Ce certificat est présenté à : 
                    </p>
                    <p class="student-name">Equipe {{$premierClassement->nomequipe}}</p>
                </div>
                <p class="topic-title">
                    Ce certificat est décerné à {{$premierClassement->nomequipe}} en reconnaissance de sa participation exemplaire et de son engagement remarquable dans le domaine du sport.
                    Par sa détermination, son esprit d'équipe et sa persévérance, il/elle a su atteindre un niveau d'excellence admirable.
                    Nous félicitons {{$premierClassement->nomequipe}} pour ses performances exceptionnelles et lui souhaitons un avenir brillant et rempli de succès sportifs.
                </p>
                <div class="text-center">
                    <p class="topic-description text-muted">ULTIMATE TEAM RACE</p>
                </div>
            </div>
            <div class="certificate-footer text-muted">
                <div class="row">
                    <div class="col-md-6">
                        <p>Signature: ______________________</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

