
<div class="container">
    <div class="top-part">
        <div class="start-part">
            <h3 class="company-name">أولم</h3>
            <p>
                <Span>From: </Span>{{ $email }}</p>
            <p>
                <Span>Name: </Span>{{ $name }}</p>
        </div>
    </div>
    <div class="body-part">
        <div class="section">
            <h5>Email Date</h5>
            <div class="date">
                <p>{{ date('Y-m-d H:i') }}</p>
            </div>
        </div>
        <div class="section">
            <h5>Email Title</h5>
            <div class="title">
                <h3>{{ $subject }}</h3>
            </div>
        </div>
        <div class="section">
            <h5>Email Body</h5>
            <div class="body">
                <p>
                    {{ $content }}      
                          </p>
            </div>
        </div>
    </div>
</div>



<style>
    .container {
        width: 90%;
        margin: auto;
    }
    
    .top-part {
        border: 1px solid #ddd;
        padding: 2%;
        width: 100%;
        display: block;
        border-radius: 5px;
    }
    
    .start-part {
        width: 50%;
        text-align: start;
        display: inline-block;
    }
    
    .company-name {
        color: #FB4D30;
        text-transform: uppercase;
    }
    
    p {
        color: #364049;
    }
    
    p span {
        font-weight: 600;
    }
    
    .end-part {
        width: 49%;
        display: inline-block;
        text-align: end;
    }
    
    .body-part {
        border: 1px solid #ddd;
        padding: 2%;
        width: 100%;
        display: block;
        border-radius: 5px;
    }
    
    h5 {
        text-transform: uppercase;
        font-weight: 600;
        display: block;
        width: 100%;
    }
    
    .title {
        padding: 1em;
        text-align: start;
        background-color: #FB4D30;
        color: #fff;
        width: fit-content;
        border-radius: 5px;
    }
    
    .title h3 {
        color: #fff;
        margin: 0;
    }
    
    .body {
        border: 1px solid #ddd;
        background-color: #fafafa;
        padding: 1em;
        border-radius: 5px;
    }
    
    .body p {
        color: #333;
        font-size: 1.1em;
        line-height: 1.7em;
    }
    
    .date {
        color: #707070;
    }
    
    .section {
        margin-bottom: 2em;
    }
</style>