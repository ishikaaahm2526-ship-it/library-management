<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $title; ?> - SKF Central Library</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
<style>
  /* Library theme: cream, forest green, gold */
  body { background:#faf6ee; font-family:'Lato',sans-serif; color:#2b2b2b; }
  h1,h2,h3,h4,h5,.brand { font-family:'Playfair Display',serif; color:#1f4d3a; }
  .bg-forest { background:#1f4d3a; }
  .logo-pill { background:#fff; border-radius:50px; padding:4px 12px; display:inline-block; }
  .logo-pill img { height:40px; }
  .btn-forest { background:#1f4d3a; color:#fff; border:none; }
  .btn-forest:hover { background:#163a2b; color:#fff; }
  .btn-gold { background:#c9a227; color:#fff; border:none; }
  .btn-gold:hover { background:#a8851a; color:#fff; }
  .gold-line { border-bottom:3px solid #c9a227; }
  .card { border:1px solid #e3d9c2; background:#fffdf8; }
  .table thead th { background:#1f4d3a; color:#fff; font-weight:700; }
  .sidebar { position:fixed; top:0; left:0; bottom:0; width:240px; background:#1f4d3a; color:#fff; padding:20px 15px; }
  .sidebar a { color:#e9e2cc; text-decoration:none; display:block; padding:10px 12px; border-radius:6px; }
  .sidebar a:hover { background:#2d6a50; color:#fff; }
  .main-admin { margin-left:240px; padding:25px; }
  @media (max-width:768px) { .sidebar { position:static; width:100%; } .main-admin { margin-left:0; } }
</style>
</head>
<body>
