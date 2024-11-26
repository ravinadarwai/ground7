<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management</title>
    <link rel="stylesheet" href="main.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f7f7f7;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.event-modal {
    background-color: white;
    padding: 20px;
    border-radius: 16px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    width: 350px;
    border: 1px solid #ddd;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.header input {
    border: none;
    font-size: 18px;
    font-weight: bold;
    width: 70%;
    color: #eb1f1f;
}

.header input:focus {
    outline: none;
}

.actions button {
    background: none;
    border: none;
    cursor: pointer;
    font-size: 18px;
}

.details {
    margin-top: 20px;
}

.details label {
    display: block;
    margin-top: 10px;
    font-size: 14px;
    color: #555;
}

.details input, .details select, .details textarea {
    width: 100%;
    padding: 5px;
    margin-top: 5px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 8px;
}

.details textarea {
    resize: none;
    height: 60px;
}

.comments-section {
    margin-top: 20px;
}

.comments-section h3 {
    margin: 0;
    font-size: 16px;
    color: #555;
}

#comments {
    margin-top: 10px;
    max-height: 100px;
    overflow-y: auto;
}

.comment {
    display: flex;
    align-items: flex-start;
    background-color: #f1f1f1;
    padding: 5px;
    margin-bottom: 5px;
    border-radius: 8px;
    border: 1px solid #ccc;
}

.comment img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 10px;
}

.comment-content {
    flex: 1;
}

.comment-content p {
    margin: 0;
    font-size: 14px;
    color: #555;
}

.comment-actions {
    display: flex;
    margin-top: 5px;
}

.comment-actions button {
    background: none;
    border: none;
    cursor: pointer;
    font-size: 14px;
    margin-right: 5px;
    color: #007bff;
}

#new-comment {
    width: calc(100% - 30px);
    padding: 5px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 8px;
    resize: none;
    margin-top: 10px;
    height: 40px;
}

#add-comment-btn {
    background: none;
    border: none;
    cursor: pointer;
    font-size: 18px;
    position: absolute;
    margin-left: 5px;
    margin-top: 10px;
}
.logo1{
    
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 10px;
}
    </style>
</head>
<body>
    <div class="event-modal">
        <div class="header">
            <input type="text" id="event-title" value="Flower Arrangement">
            <div class="actions">
                <button id="complete-btn" title="Mark as Complete">✔️</button>
                <button id="delete-btn" title="Delete Event">🗑️</button>
            </div>
        </div>
        <div class="details">
            <div class="date-time">
                <label for="event-date">Date and Time:</label>
                <input type="datetime-local" id="event-date" value="2024-12-05T08:00">
            </div>
            <div class="assign-to">
                <label for="assign">Assign to:</label>
            
                <select id="assign">
                    
                    <option value="Jane Smith" >Jane Smith</option>
                    <option value="John Doe">John Doe</option>
                </select>
            </div>
            <div class="note">
                <label for="note">Note:</label>
                <textarea id="note">09382049832&#10;www.flowervendor.com</textarea>
            </div>
        </div>
        <div class="comments-section">
            <h3>Comments</h3>
            <div id="comments">
                <div class="comment">
                    <img src="https://tse3.mm.bing.net/th?id=OIP.IHjz0u5xklfurD7TKVVE-QHaE2&pid=Api&P=0&h=180" alt="Avatar">
                    <div class="comment-content">
                        <p><strong>Jane Smith:</strong> Thanks for assigning me on the task. We’ll get the details ironed out.</p>
                        <div class="comment-actions">
                            <button class="edit-comment-btn">✏️</button>
                            <button class="delete-comment-btn">🗑️</button>
                        </div>
                    </div>
                </div>
            </div>
            <textarea id="new-comment" placeholder="Write comment..."></textarea>
            <button id="add-comment-btn">➤</button>
        </div>
    </div>

    <script src="main.js"></script>
</body>
</html>
