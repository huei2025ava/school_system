<div class="h-100 overflow-auto">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold mb-0">校園映像資料管理</h3>
        <button type="button" class="btn btn-success fw-bold shadow-sm" 
                onclick="op('#cover','#cvr','modal/<?= $do ?>.php?table=<?= $do ?>')">
            <i class="bi bi-plus-lg"></i> 新增校園映像圖片
        </button>
    </div>

    <form method="post" action="./api/edit.php?table=<?= $do ?>">
        <div class="card shadow-sm border-0 mb-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 text-center">
                    <thead class="table-light">
                        <tr>
                            <th width="50%" class="text-start ps-4">校園映像資料</th>
                            <th width="15%">顯示</th>
                            <th width="15%">刪除</th>
                            <th width="20%" class="pe-4">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = $Image->count();
                        $div = 3;
                        $pages = ceil($total / $div);
                        $now = $_GET['p'] ?? 1;
                        $start = ($now - 1) * $div;
                        $rows = $Image->all("limit $start,$div");
                        foreach ($rows as $row):
                        ?>
                        <tr>
                            <td class="text-start ps-4">
                                <img src="upload/<?= $row['img']; ?>" class="rounded border shadow-sm" style="height: 80px; width: 120px; object-fit: cover;">
                                <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                            </td>
                            <td>
                                <div class="form-check d-flex justify-content-center">
                                    <input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? "checked" : ""; ?> class="form-check-input">
                                </div>
                            </td>
                            <td>
                                <div class="form-check d-flex justify-content-center">
                                    <input type="checkbox" name="del[]" value="<?= $row['id']; ?>" class="form-check-input border-danger">
                                </div>
                            </td>
                            <td class="pe-4">
                                <button type="button" class="btn btn-outline-primary btn-sm fw-bold px-3"
                                        onclick="op('#cover','#cvr','modal/update.php?table=<?= $do ?>&id=<?= $row['id']; ?>')">
                                    更換圖片
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- 分頁元件 -->
        <nav aria-label="Page navigation" class="mb-4">
            <ul class="pagination justify-content-center">
                <?php 
                if ($now > 1){
                    $prev = $now - 1;
                    echo "<li class='page-item'><a class='page-link fw-bold' href='?do=$do&p=$prev'>&laquo;</a></li>";
                }
                for ($i = 1; $i <= $pages; $i++) {
                    $active = ($i == $now) ? "active shadow-sm" : "";
                    echo "<li class='page-item $active'><a class='page-link fw-bold' href='?do=$do&p=$i'> $i </a></li>";
                }
                if ($now < $pages){
                    $next = $now + 1;
                    echo "<li class='page-item'><a class='page-link fw-bold' href='?do=$do&p=$next'>&raquo;</a></li>";
                }
                ?>
            </ul>
        </nav>

        <div class="d-flex justify-content-center gap-3 mt-5 pb-5">
            <button type="submit" class="btn btn-primary btn-lg px-5 fw-bold shadow">修改確定</button>
            <button type="reset" class="btn btn-outline-secondary btn-lg px-5 fw-bold">重置</button>
        </div>
    </form>
</div>
