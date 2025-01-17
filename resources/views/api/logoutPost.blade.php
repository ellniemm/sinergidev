<script>
    // Menangani logout
    document.getElementById('logoutButton').addEventListener('click', async () => {
        try {
            // Ambil token dari localStorage
            const token = localStorage.getItem('authToken');
            if (!token) {
                alert('You are not logged in!');
                return;
            }

            // Kirim request ke endpoint logout
            const response = await fetch('https://sinergi.xazif.my.id/api/logout', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}` // Sertakan token di header Authorization
                }
            });

            if (response.ok) {
                // Hapus token dari localStorage
                localStorage.removeItem('authToken');

                alert('You have successfully logged out.');
                // Redirect ke halaman login
                window.location.href = '/login';
            } else {
                const result = await response.json();
                alert(result.message || 'Failed to logout. Please try again.');
            }
        } catch (error) {
            console.error('Error:', error);
            alert('An unexpected error occurred. Please try again later.');
        }
    });
</script>
