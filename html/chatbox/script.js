// document.addEventListener('DOMContentLoaded', function() {
//     loadPosts();
// });

// function loadPosts() {
//     fetch('load_posts.html')
//         .then(response => response.json())
//         .then(posts => {
//             const postContainer = document.querySelector('.posts');
//             posts.forEach(post => {
//                 let postElement = `
//                     <div class="post">
//                         <h3>${post.username}</h3>
//                         <p>${post.description}</p>
//                         ${post.media_type === 'image' ? `<img src="${post.media_url}" />` : `<video src="${post.media_url}" controls></video>`}
//                         <div>
//                             <button onclick="likePost(${post.id})">${post.likes} Likes</button>
//                             <span>${post.comments.length} Comments</span>
//                         </div>
//                     </div>
//                 `;
//                 postContainer.innerHTML += postElement;
//             });
//         });
// }

// function sendMessage() {
//     const message = document.getElementById('message').value;
    // Send message to the server logic here
// }

function likePost(postId) {
    const likeCountElement = document.getElementById(`like-count-${postId}`);
    const heartIconElement = document.getElementById(`heart-icon-${postId}`);
    let likes = parseInt(likeCountElement.textContent);

    // Toggle the heart icon and update likes count
    if (heartIconElement.classList.contains('fa-regular')) {
        heartIconElement.classList.remove('fa-regular');
        heartIconElement.classList.add('fa-solid'); // Change to filled heart
        likes++; // Increment like count
    } else {
        heartIconElement.classList.remove('fa-solid');
        heartIconElement.classList.add('fa-regular'); // Change to regular heart
        likes--; // Decrement like count
    }

    // Update the like count display
    likeCountElement.textContent = likes;

    // Optionally, send an AJAX request to update the like count in the database
    // Example: updateLikesInDatabase(postId, likes);
}



function toggleDescription(button) {
    const fullDescription = button.previousElementSibling; // Get the full description
    if (fullDescription.style.display === "none") {
        fullDescription.style.display = "block"; // Show full description
        button.innerText = "Read Less"; // Change button text
    } else {
        fullDescription.style.display = "none"; // Hide full description
        button.innerText = "Read More"; // Change button text
    }
}

function toggleDescription(postId) {
    var description = document.getElementById('description-' + postId);
    var readMoreLink = document.getElementById('read-more-' + postId);

    if (description.classList.contains('description-expanded')) {
        description.classList.remove('description-expanded');
        readMoreLink.innerHTML = 'Read More';
    } else {
        description.classList.add('description-expanded');
        readMoreLink.innerHTML = 'Show Less';
    }
}

