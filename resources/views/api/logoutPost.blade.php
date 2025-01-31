<script>
    // fungsi ambil token 
    function getTokenCookie() {
        const value =` ; ${document.cookie}`;
        const parts = value.split(`; authToken=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
    }
    // Menangani logout
    document.getElementById('logoutButton').addEventListener('click', async () => {
        try {
            // Ambil token dari cookie
            const token = getTokenCookie('authToken');
            if (!token) {
                alert('You are not logged in!');
                return;
            }

            // Kirim request ke endpoint logout
            const response = await fetch('https://sinergi.dev.ybgee.my.id/api/logout', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token} `// Sertakan token di header Authorization
                }
            });

            if (response.ok) {
                // Hapus token dari cookie
                document.cookie =` authToken=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/`;
                setTimeout(() => {
                    window.location.href = '/login';
                }, 1000);
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