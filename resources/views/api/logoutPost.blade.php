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

    // Menangani logout
    document.getElementById('logoutButton').addEventListener('click', async () => {
        const token = getTokenCookie('authToken');
        
        try {
            if (!token) {
                // Jika tidak ada token, langsung redirect ke login
                window.location.href = '/login';
                return;
            }

            // Kirim request ke endpoint logout
            const response = await fetch('https://sinergi.dev.ybgee.my.id/api/logout', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`
                }
            });

            // Hapus token apapun hasilnya (berhasil atau gagal)
            clearTokenCookie();

            if (response.ok) {
                // Logout berhasil dari sisi server
                window.location.href = '/login';
            } else {
                // Jika response tidak ok (termasuk token kadaluarsa)
                try {
                    const result = await response.json();
                    console.error('Logout failed:', result.message);
                } catch (parseError) {
                    console.error('Failed to parse error response');
                }
                
                // Tetap redirect ke halaman login
                window.location.href = '/login';
            }
        } catch (error) {
            // Tangani error koneksi atau server
            console.error('Logout error:', error);
            
            // Hapus token dan redirect
            clearTokenCookie();
            window.location.href = '/login';
        }
    });
</script>
