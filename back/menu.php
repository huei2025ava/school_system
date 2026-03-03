<div class="h-100 overflow-auto">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold mb-0">選單管理</h3>
        <button type="button" class="btn btn-success fw-bold shadow-sm" 
                onclick="op('#cover','#cvr','modal/<?= $do ?>.php?table=<?= $do ?>')">
            <i class="bi bi-plus-lg"></i> 新增主選單
        </button>
    </div>

    <form method="post" action="./api/edit.php?table=<?= $do ?>">
        <div class="card shadow-sm border-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th width="30%" class="ps-4">主選單名稱</th>
                            <th width="30%">選單連結網址</th>
                            <th width="10%" class="text-center">次選單數</th>
                            <th width="10%" class="text-center">顯示</th>
                            <th width="10%" class="text-center">刪除</th>
                            <th width="10%" class="text-center pe-4">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $rows = $Menu->all(['main_id' => 0]);
                        foreach ($rows as $row):
                        ?>
                        <tr>
                            <td class="ps-4">
                                <input type="text" name="text[<?= $row['id']; ?>]" value="<?= $row['text']; ?>" class="form-control">
                            </td>
                            <td>
                                <input type="text" name="href[<?= $row['id']; ?>]" value="<?= $row['href']; ?>" class="form-control">
                            </td>
                            <td class="text-center">
                                <span class="badge bg-secondary rounded-pill"><?= $Menu->count(['main_id' => $row['id']]); ?></span>
                            </td>
                            <td class="text-center">
                                <div class="form-check d-flex justify-content-center">
                                    <input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? "checked" : ""; ?> class="form-check-input">
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="form-check d-flex justify-content-center">
                                    <input type="checkbox" name="del[]" value="<?= $row['id']; ?>" class="form-check-input border-danger">
                                </div>
                            </td>
                            <td class="text-center pe-4">
                                <button type="button" class="btn btn-outline-primary btn-sm fw-bold px-3"
                                        onclick="op('#cover','#cvr','modal/submenu.php?id=<?= $row['id']; ?>')">
                                    編輯次選單
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="d-flex justify-content-center gap-3 mt-5 pb-5">
            <button type="submit" class="btn btn-primary btn-lg px-5 fw-bold shadow">修改確定</button>
            <button type="reset" class="btn btn-outline-secondary btn-lg px-5 fw-bold">重置</button>
        </div>
    </form>
</div>