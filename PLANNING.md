# PLANNING & CHECKLIST SISTEM PEMINJAMAN ALAT DAN RUANGAN
Universitas Muhammadiyah Banjarmasin

---

## 1. ANALISIS ALUR BISNIS SAAT INI
- Pengecekan Ketersediaan → Mahasiswa/Staff ke Rumah Tangga
- Pengajuan Administrasi → Ke Bagian Umum dengan surat resmi
- Persetujuan Pimpinan → ACC dari pimpinan
- Surat Rekomendasi → Dari Bagian Umum
- Fotocopy & Antar → Ke Rumah Tangga
- Pencatatan Manual → Papan tanggal (ruangan) & buku inventaris (alat)
- Jaminan KTM → Untuk peminjaman alat
- Pengembalian → KTM dikembalikan setelah alat dikembalikan

## 2. IDENTIFIKASI AKTOR SISTEM
- **Primary:** Peminjam (Mahasiswa/Dosen/Staff), Admin Rumah Tangga, Admin Bagian Umum, Pimpinan
- **Secondary:** Super Admin (IT/System Admin)

## 3. FITUR UTAMA SISTEM
### Untuk Peminjam
- Dashboard peminjaman
- Cek ketersediaan ruangan/alat real-time
- Pengajuan peminjaman online
- Upload dokumen persyaratan
- Tracking status peminjaman
- History peminjaman
- Notifikasi status

### Untuk Admin Rumah Tangga
- Dashboard ketersediaan
- Manajemen ruangan dan alat
- Konfirmasi ketersediaan
- Input data KTM sebagai jaminan
- Proses pengembalian
- Laporan peminjaman

### Untuk Admin Bagian Umum
- Review pengajuan peminjaman
- Generate surat rekomendasi
- Manajemen workflow approval
- Dashboard administrasi

### Untuk Pimpinan
- Dashboard approval
- Review dan ACC peminjaman
- Laporan executive summary

## 4. ENTITAS UTAMA SISTEM
- **Master Data:** Users, Rooms, Equipment, Categories
- **Transactional Data:** Loan Requests, Loan Items, Approvals, KTM Guarantees, Returns
- **Supporting Data:** Documents, Notifications, Activity Logs

## 5. STATUS FLOW PEMINJAMAN
DRAFT → SUBMITTED → CHECKED → APPROVED → RECOMMENDATION_ISSUED → CONFIRMED → ACTIVE → RETURNED → COMPLETED

## 6. KEBUTUHAN TEKNIS
- Backend: Laravel 10+
- Frontend: Blade Templates + Livewire (atau Vue.js/React)
- Database: MySQL/PostgreSQL
- Authentication: Laravel Sanctum/Passport
- File Storage: Laravel Storage (local/S3)
- Queue: Redis/Database
- Notification: Mail/WhatsApp API
- Laravel Packages: spatie/laravel-permission, spatie/laravel-activitylog, barryvdh/laravel-dompdf, intervention/image, maatwebsite/excel, pusher/pusher-php-server

## 7. STRUKTUR MODUL LARAVEL (REKOMENDASI)
- app/Http/Controllers/Admin/
- app/Http/Controllers/Loan/
- app/Http/Controllers/Dashboard/
- app/Models/
- app/Services/
- app/Jobs/
- app/Policies/

## 8. KEUNGGULAN SISTEM DIGITAL
- Efisiensi, Transparansi, Akurasi

## 9. TANTANGAN IMPLEMENTASI
- Teknis: Integrasi, Migrasi data, Real-time sync, Responsif mobile
- Organisasi: Change management, Training, SOP, Backup & recovery

## 10. ROADMAP PENGEMBANGAN
- Phase 1 (MVP): Basic CRUD, Simple workflow, Auth, Basic reporting
- Phase 2: Advanced workflow, Real-time notif, Mobile app, API
- Phase 3: Analytics, IoT, AI, Advanced reporting

---

> **Catatan:**
> - Semua pengembangan fitur dan perubahan kode WAJIB mengacu pada dokumen ini.
> - Setiap fitur baru harus dicek kesesuaiannya dengan alur, entitas, dan status flow di atas.
> - Checklist dan roadmap dapat diperbarui sesuai kebutuhan bersama.
> - Selalu review dokumen ini sebelum memulai/mengubah fitur!
