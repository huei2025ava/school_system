<div class="h-100 overflow-auto">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold mb-0">最新消息管理</h3>
        <button type="button" class="btn btn-success fw-bold shadow-sm" 
                onclick="op('#cover','#cvr','modal/<?= $do ?>.php?table=<?= $do ?>')">
            <i class="bi bi-plus-lg"></i> 新增最新消息
        </button>
    </div>

    <form method="post" action="./api/edit.php?table=<?= $do ?>">
        <div class="card shadow-sm border-0 mb-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th width="80%" class="ps-4">最新消息資料</th>
                            <th width="10%" class="text-center">顯示</th>
                            <th width="10%" class="text-center pe-4">刪除</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = $News->count();
                        $div = 5;
                        $pages = ceil($total / $div);
                        $now = $_GET['p'] ?? 1;
                        $start = ($now - 1) * $div;
                        $rows = $News->all("limit $start,$div");
                        foreach ($rows as $row):
                        ?>
                        <tr>
                            <td class="ps-4">
                                <textarea name="text[<?= $row['id']; ?>]" class="form-control" rows="3"><?= $row['text']; ?></textarea>
                            </td>
                            <td class="text-center">
                                <div class="form-check d-flex justify-content-center">
                                    <input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? "checked" : ""; ?> class="form-check-input">
                                </div>
                            </td>
                            <td class="text-center pe-4">
                                <div class="form-check d-flex justify-content-center">
                                    <input type="checkbox" name="del[]" value="<?= $row['id']; ?>" class="form-check-input border-danger">
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Bootstrap Pagination -->
        <nav aria-label="Page navigation" class="mb-4">
            <ul class="pagination justify-content-center">
                <?php
                if ($now > 1):
                    $prev = $now - 1;
                ?>
                <li class="page-item">
                    <a class="page-link" href="?do=<?= $do ?>&p=<?= $prev ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php endif; ?>

                <?php
                for ($i = 1; $i <= $pages; $i++):
                    $active = ($i == $now) ? "active" : "";
                ?>
                <li class="page-item <?= $active ?>">
                    <a class="page-link" href="?do=<?= $do ?>&p=<?= $i ?>"><?= $i ?></a>
                </li>
                <?php endfor; ?>

                <?php
                if ($now < $pages):
                    $next = $now + 1;
                ?>
                <li class="page-item">
                    <a class="page-link" href="?do=<?= $do ?>&p=<?= $next ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </nav>

        <div class="d-flex justify-content-center gap-3 mt-4 pb-5">
            <input type="hidden" name="table" value="<?= $do ?>">
            <button type="submit" class="btn btn-primary btn-lg px-5 fw-bold shadow">修改確定</button>
            <button type="reset" class="btn btn-outline-secondary btn-lg px-5 fw-bold">重置</button>
        </div>
    </form>
</div>