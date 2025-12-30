document.addEventListener('DOMContentLoaded', () => {
    fetch('profile.php')
        .then(response => response.json())
        .then(data => {
            console.log(data); 
            if (data.success) {
                document.getElementById('username').textContent = data.name;
                document.getElementById('email').textContent = data.email;
                document.getElementById('member-since').textContent = data.member_since;
            } else {
                document.getElementById('username').textContent = "Not Logged In";
                document.getElementById('email').textContent = "-";
                document.getElementById('member-since').textContent = "-";
            }
        })
        .catch(error => {
            console.error('Error fetching profile data:', error);
        });
});
