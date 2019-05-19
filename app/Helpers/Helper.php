<?php
//đệ quy danh mục
if (!function_exists('multiple_lever_category')) {
    function multiple_lever_category($categories, $parent_id = 0, $char = '', $cat_parent_id = 0)
    {
        foreach ($categories as $key => $item) {
            if ($item->Id_NhomSp_Cha == $parent_id) {
                echo "<option value=\"" . $item->Id_DanhMucSp . "\"";
                echo ($cat_parent_id == $item->Id_DanhMucSp) ? 'selected' : '';
                echo ">";
                echo $char . $item->TieuDe;
                echo '</option>';
                $categories->forget($key);

                multiple_lever_category($categories, $item->Id_DanhMucSp, $char . '|---', $cat_parent_id);
            }
        }
    }
}

if (!function_exists('table_category')) {
    function table_category($categories, $parent_id = 0, $char = '')
    {
        foreach ($categories as $key => $item) {
            if ($item->Id_NhomSp_Cha == $parent_id) {

                echo '<tr>';
                echo '<td>';
                echo $item->Id_DanhMucSp;
                echo '</td>';
                echo '<td>';
                echo $char . $item->TieuDe;
                echo '</td>';
                echo '<td>';
                if ($item->TrangThai == 1) {
                    echo '<label class="label label-success">Active</label>';
                } else {
                    echo ' <label class="label label-danger">Ban</label>';
                }
                echo '</td>';
                echo '<td>';
                if (Auth::guard('admin')->user()->quyen == 1) {
                    echo "<a href =\"" . route('category.edit', ['id' => $item->Id_DanhMucSp]) . "\" class=\"btn btn-action label label-success\">";
                    echo "<i class=\"fa fa-pencil\"></i></a>";
                }

                if (Auth::guard('admin')->user()->quyen == 1 && $item->child()->count() == 0) {
                    echo "<form action=" . route('category.destroy', ['id' => $item->Id_DanhMucSp]) . " method='post' class = 'inline' >";
                    echo csrf_field();
                    echo method_field('DELETE');
                    echo " <button type=\"submit\" onclick=\"return confirm('Bạn có chắc muốn xóa')\"
                                                        class=\"btn btn-action label label-danger\">
                                                    <i class=\"fa fa-trash\"></i>
                                                </button>";
                    echo "</form>";
                }
                echo '</td>';
                echo '</tr>';

                $categories->forget($key);

                table_category($categories, $item->Id_DanhMucSp, $char . '|---');
            }
        }
    }

}

if (!function_exists('menu_header_cat')) {
    function menu_header_cat($categories, $parent_id = 0)
    {

        // Lấy danh sách cá danh mục con
        $cat_child = collect();
        foreach ($categories as $key => $item) {
            if ($item->parent_id == $parent_id) {
                $cat_child->push($item);
                $categories->forget($key);
            }
        }
//        dd($cat_child);
        if ($cat_child) {
            foreach ($cat_child as $key => $item) {
                if ($item->child()->count()) {
                    echo '<li class="dropdown-submenu">';
                    echo '<a class="child" href="' . route('danh-muc', ['id' => $item->id, 'slug' => $item->slug]) . '">' . $item->name . '<span class="caret"></span></a>';
                    echo '<ul class="dropdown-menu menu-child">';
                    menu_header_cat($categories, $item->id);
                    echo '</ul>';
                    echo '</li>';
                } else {
                    echo '<li>';
                    echo '<a href="' . route('danh-muc', ['id' => $item->id, 'slug' => $item->slug]) . '">' . $item->name . '</a>';
                    menu_header_cat($categories, $item->id);
                    echo '</li>';
                }
            }
        }
    }
}

if (!function_exists('format_money')) {
    function format_money($price)
    {
        return number_format($price, 0, ',', '.') . " đ";
    }
}

if (!function_exists('discount')) {
    function discount($price, $discount_price)
    {
        $dis = round((($price - $discount_price) * 100 / $price));
        return " - " . $dis . "%";
    }
}


if (!function_exists('total_money_cart')) {
    function total_money_cart($cart)
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['qty'] * $item['price'];
        }
        return format_money($total);
    }
}
if (!function_exists('total_money_order')) {
    function total_money_order($cart)
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['qty'] * $item['price'];
        }
        return $total;
    }
}
