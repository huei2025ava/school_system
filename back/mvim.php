<div class="h-100 overflow-auto">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold mb-0">動畫圖片管理</h3>
        <button type="button" class="btn btn-success fw-bold shadow-sm" 
                onclick="op('#cover','#cvr','modal/<?= $do ?>.php?table=<?= $do ?>')">
            <i class="bi bi-plus-lg"></i> 新增動畫圖片
        </button>
    </div>

    <form method="post" action="./api/edit.php?table=<?= $do ?>">
        <div class="card shadow-sm border-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 text-center">
                    <thead class="table-light">
                        <tr>
                            <th width="50%" class="text-start ps-4">動畫圖片</th>
                            <th width="15%">顯示</th>
                            <th width="15%">刪除</th>
                            <th width="20%" class="pe-4">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $rows = $Mvim->all();
                        foreach ($rows as $row):
                        ?>
                        <tr>
                            <td class="text-start ps-4">
                                <img src="upload/<?= $row['img']; ?>" class="rounded border shadow-sm" style="height: 100px; width: 150px; object-fit: cover;">
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
                                        onclick="op('#cover','#cvr','modal/update.php?table=<?= $do; ?>&id=<?= $row['id']; ?>')">
                                    更換動畫
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
