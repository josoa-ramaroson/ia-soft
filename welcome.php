<?php
require 'session.php';
require 'fonction.php';
require 'fc-affichage.php';
require 'bienvenue.php';
?>

<div class="text-center">
    <div class="wheel-container">
        <div id="wheel-svg"></div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<?php
// Requête pour récupérer la dernière information
$sql = "SELECT * FROM $tbl_com ORDER BY idcom DESC LIMIT 1";
$req = mysqli_query($linki, $sql);

if ($req) {
    $data = mysqli_fetch_array($req, MYSQLI_ASSOC);
    if ($data) {
        ?>
        <table width="100%" border="0">
            <tr>
                <td>&nbsp;</td>
                <td align="center">
                    <strong>
                        <span style="color: #000000">
                            <?php echo htmlspecialchars($data['detail']); ?>
                        </span>
                    </strong>
                </td>
                <td>&nbsp;</td>
            </tr>
        </table>
        <?php
    } else {
        echo '<p>Aucune information</p>';
    }
}

mysqli_close($linki);
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td><div align="center"></div></td>
    </tr>
    <tr>
        <td height="21">&nbsp;</td>
    </tr>
    <tr>
        <td height="21"></td>
    </tr>
</table>

<?php include_once('pied.php'); ?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: system-ui, -apple-system, sans-serif;
        background: linear-gradient(to bottom right, #f8fafc, #e2e8f0);
        min-height: 100vh;
    }

    .container {
        max-width: 1400px;
        margin: 0 auto;
        display: flex;
        flex-direction: row;
        gap: 1.5rem;
        align-items: flex-start;
        padding: 0 1rem;
    }

    .wheel-container {
        flex: 3;
        background: white;
        border-radius: 0.75rem;
        padding: 1.5rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        width: 100%;
        max-height: 700px;
    }

    .sidebar {
        flex: 1;
        background: white;
        border-radius: 0.75rem;
        padding: 1.25rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    .category-list h2 {
        font-size: clamp(1.25rem, 2vw, 1.5rem);
        color: #1e293b;
        margin-bottom: 1.25rem;
        max-width: 100%;
        overflow-wrap: break-word;
        word-wrap: break-word;
        hyphens: auto;
        line-height: 1.3;
    }

    .category-item {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        padding: 0.75rem;
        border-radius: 0.5rem;
        cursor: pointer;
        transition: background-color 0.2s;
        width: 100%;
        min-width: 0;
    }

    .category-item:hover {
        background-color: #f8fafc;
    }

    .category-color {
        min-width: 1rem;
        height: 1rem;
        border-radius: 50%;
        box-shadow: 0 0 0 2px white;
        transition: transform 0.2s;
        flex-shrink: 0;
    }

    .category-item:hover .category-color {
        transform: scale(1.1);
    }

    .category-name {
        font-weight: 500;
        color: #334155;
        flex: 1;
        font-size: clamp(0.875rem, 1.5vw, 1rem);
        min-width: 0;
        overflow-wrap: break-word;
        word-wrap: break-word;
        hyphens: auto;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .module-count {
        color: #64748b;
        font-size: clamp(0.75rem, 1.2vw, 0.875rem);
        white-space: nowrap;
        flex-shrink: 0;
        margin-left: 0.5rem;
    }

    .subtitle,
    h3,
    .h3-like {
        font-size: clamp(1rem, 1.5vw, 1.25rem);
        color: #475569;
        margin-bottom: 1rem;
        max-width: 100%;
        overflow-wrap: break-word;
        word-wrap: break-word;
        hyphens: auto;
        line-height: 1.4;
        display: inline-flex;
        flex-wrap: wrap;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    td {
        padding: 0.75rem;
        max-width: 0;
        overflow-wrap: break-word;
        word-wrap: break-word;
        hyphens: auto;
    }

    .text-center {
        text-align: center;
        margin: 1.5rem 0;
    }

    .btn {
        display: inline-block;
        padding: 0.5rem 1rem;
        text-decoration: none;
        border-radius: 0.375rem;
        font-size: 0.875rem;
        transition: all 0.2s;
    }

    .btn-primary {
        background-color: #2563eb;
        color: white;
    }

    .btn-primary:hover {
        background-color: #1d4ed8;
    }

    @media (max-width: 1024px) {
        .container {
            gap: 1rem;
            padding: 0 0.75rem;
        }

        .wheel-container, .sidebar {
            padding: 1rem;
        }

        .subtitle, h3, .h3-like {
            margin-bottom: 0.875rem;
        }
    }

    @media (max-width: 768px) {
        .container {
            flex-direction: column;
        }

        .wheel-container, .sidebar {
            flex: none;
            width: 100%;
        }

        body {
            padding: 0.75rem;
        }

        .category-name {
            -webkit-line-clamp: 2;
        }
    }

    @media (max-width: 480px) {
        body {
            padding: 0.5rem;
        }

        .container {
            padding: 0 0.5rem;
        }

        .wheel-container, .sidebar {
            padding: 0.875rem;
            border-radius: 0.5rem;
        }

        .category-item {
            padding: 0.625rem;
        }

        .btn {
            padding: 0.375rem 0.75rem;
            font-size: 0.813rem;
        }

        .subtitle, h3, .h3-like {
            font-size: 1rem;
            margin-bottom: 0.75rem;
        }
    }
</style>

<script type="text/javascript" src="/js/wheel.js"></script>