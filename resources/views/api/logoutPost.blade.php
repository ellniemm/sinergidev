<script>
    // fungsi ambil token 
    function getTokenCookie() {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; authToken=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
    }

    // Fungsi untuk menghapus token cookie
    function clearTokenCookie() {
        document.cookie = `authToken=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/; SameSite=Strict`;
    }

    
    document.getElementById('logoutButton').addEventListener('click', async () => {
        const token = getTokenCookie('authToken');
        
        try {
            if (!token) {
                
                window.location.href = '/login';
                return;
            }

            
            const response = await fetch('https://sinergi.dev.ybgee.my.id/api/logout', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`
                }
            });

            
            clearTokenCookie();

            if (response.ok) {
                
                window.location.href = '/login';
            } else {
                
                try {
                    const result = await response.json();
                    console.error('Logout failed:', result.message);
                } catch (parseError) {
                    console.error('Failed to parse error response');
                }
                
                
                window.location.href = '/login';
            }
        } catch (error) {
            
            console.error('Logout error:', error);
            
            
            clearTokenCookie();
            window.location.href = '/login';
        }
    });
</script>
