<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Ticket</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto+Slab:wght@300&display=swap"
        rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-family: "Montserrat", sans-serif;
        }

        .ticket-container {
            background-color: white;
            width: 600px;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            border-left: 10px solid #ed8855;
        }

        .ticket-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .ticket-header h1 {
            margin: 0;
            font-family: "Roboto Slab", serif;
            font-size: 2.5rem;
            color: #f9522e;
        }

        .ticket-info {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-bottom: 10px;
        }

        .ticket-info div {
            flex-basis: 48%;
            margin-bottom: 10px;
        }

        .ticket-info div label {
            display: block;
            font-weight: bold;
            color: #666;
        }

        .ticket-info div p {
            margin: 5px 0 0;
            font-size: 1.1rem;
            color: #333;
        }

        .ticket-footer {
            text-align: center;
            margin-top: 20px;
        }

        .ticket-footer button {
            background-color: #ed8855;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-family: "Montserrat", sans-serif;
            transition: background-color 0.2s ease;
        }

        .ticket-footer button:hover {
            background-color: #f9522e;
        }
    </style>
</head>

<body>
    <div class="ticket-container">
        <div class="ticket-header">
            <h1>Bus Ticket</h1>
        </div>
        <div class="ticket-info">
            <div>
                <label>Customer Name:</label>
                <p>John Doe</p>
            </div>
            <div>
                <label>Bus Name:</label>
                <p>Express Voyager</p>
            </div>
            <div>
                <label>Boarding Place:</label>
                <p>Central Bus Station</p>
            </div>
            <div>
                <label>Destination:</label>
                <p>Downtown Terminal</p>
            </div>
            <div>
                <label>Departure Time:</label>
                <p>10:30 AM</p>
            </div>
            <div>
                <label>Email:</label>
                <p>john.doe@email.com</p>
            </div>
        </div>
    </div>
    <div class="ticket-footer">
        <form id="downloadForm" action="download_ticket.php" method="POST">
            <button type="submit">Download Ticket</button>
        </form>
    </div>
    <script>
        document.getElementById("downloadForm").addEventListener("submit", function (event) {
            event.preventDefault(); // Prevent the default form submission
            // Submit the form using JavaScript
            this.submit();
        });
    </script>
</body>

</html>