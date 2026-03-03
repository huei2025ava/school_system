<div class="h-100 overflow-auto">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold mb-0">網站標題管理</h3>
        <button type="button" class="btn btn-success fw-bold shadow-sm" 
                onclick="op('#cover','#cvr','modal/<?= $do ?>.php?table=<?= $do ?>')">
            <i class="bi bi-plus-lg"></i> 新增網站標題圖片
        </button>
    </div>

    <form method="post" action="./api/edit.php?table=<?= $do ?>">
        <div class="card shadow-sm border-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th width="40%" class="ps-4">網站標題</th>
                            <th width="25%">替代文字</th>
                            <th width="10%" class="text-center">顯示</th>
                            <th width="10%" class="text-center">刪除</th>
                            <th width="15%" class="text-center pe-4">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $rows = $Title->all();
                        foreach ($rows as $row):
                        ?>
                        <tr>
                            <td class="ps-4">
                                <img src="upload/<?= $row['img']; ?>" class="img-fluid rounded border shadow-sm" style="max-height: 50px;">
                            </td>
                            <td>
                                <input type="text" name="text[<?= $row['id']; ?>]" value="<?= $row['text']; ?>" class="form-control">
                            </td>
                            <td class="text-center">
                                <div class="form-check d-flex justify-content-center">
                                    <input type="radio" name="sh" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? "checked" : ""; ?> class="form-check-input">
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="form-check d-flex justify-content-center">
                                    <input type="checkbox" name="del[]" value="<?= $row['id']; ?>" class="form-check-input border-danger">
                                </div>
                            </td>
                            <td class="text-center pe-4">
                                <button type="button" class="btn btn-outline-primary btn-sm fw-bold px-3"
                                        onclick="op('#cover','#cvr','modal/update.php?table=<?= $do ?>&id=<?= $row['id']; ?>')">
                                    更新圖片
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
