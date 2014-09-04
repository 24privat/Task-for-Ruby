<?php
/**
 * Добавление события
 * @param string $name название
 */
function addEvent($name)
{
	$name	 = trim($name);
	$query	 = mysql_query("INSERT INTO `events` (name) VALUE ('$name')");
}

/**
 * Редактирование события
 * @param integer $id идентификатор
 * @param string $name название
 */
function editEvent($id, $name)
{
	$name	 = trim($name);
	mysql_query("UPDATE `events` SET `name` = '$name' WHERE id = '$id'");
}

/**
 * Получение всех событий
 * @return string
 */
function getAllEvents()
{
	$query = mysql_query("SELECT * FROM `events` ORDER BY id DESC");
	
	if (mysql_num_rows($query) != 0)
	{
		while($row = mysql_fetch_assoc($query))
		{
			$str .= '
				<tr class="row-' . $row['id'] . '">
					<td>
						<input type="checkbox" name="check[]" class="check" value="' . $row['id'] . '" />
					</td>
					<td id="id" class="hidden">' . $row['id'] . '</td>
					<td>' . $row['name'] . '</td>
					<td>
						<div class="button">
							<a href="#" onclick="editEvent(' . $row['id'] . ');">
								<i class="glyphicon glyphicon-pencil"></i>
							</a>
							<a href="#" onclick="deleteEvent(' . $row['id'] . ');">
								<i class="glyphicon glyphicon-trash"></i>
							</a>
						</div>
					</td>
				</tr>
				<tr class="hidden row-edit-' . $row['id'] . '">
					<td colspan="4">
						dasdasda
					</td>
				</tr>
			';
		}
	}
	else
	{
		$str = '
			<tr>
				<td>Нет данных!</td>
			</tr>
		';
	}

	return $str;
}

/**
 * Удаление события
 * При удалении события - удаляются все задачи, связаные с ним
 * @param integer $id идентификатор
 */
function deleteEvent($id)
{
	$query = mysql_query("SELECT * FROM `tasks` WHERE event_id = '$id'");
	
	if (mysql_num_rows($query) != 0)
	{
		while($row = mysql_fetch_assoc($query))
			deleteTask((int)$row['id']);
	}
	
	mysql_query("DELETE FROM `events` WHERE id = '$id'");
}

/**
 * Получение всех задач для конкретного события
 * @param integer $id идентификатор
 * @return string
 */
function getAllTasksOfEvent($id)
{
	$query = mysql_query("SELECT * FROM `tasks` WHERE event_id = $id ORDER BY id DESC");

	if (mysql_num_rows($query) != 0)
	{
		while($row = mysql_fetch_assoc($query))
		{
			$str .= '
				<tr class="task-' . $row['id'] . '">
					<td>
						<input type="checkbox" name="check[]" class="check" value="' . $row['id'] . '" />
					</td>
					<td class="hidden">' . $row['id'] . '</td>
					<td>' . $row['name'] . '</td>
					<td>
						<div class="button">
							<a href="#" onclick="editTask(' . $row['id'] . ')">
								<i class="glyphicon glyphicon-pencil"></i>
							</a>
							<a href="#" onclick="deleteTask(' . $row['id'] . ')">
								<i class="glyphicon glyphicon-trash"></i>
							</a>
						</div>
					</td>
				</tr>
				<tr class="hidden task-edit-' . $row['id'] . '">
					<td colspan="2">
						<input type="text" name="edit-name" class="form-control edit" value="' . $row['name'] . '" />
					</td>
					<td>
						<div class="button">
							<a href="#" onclick="updateTask(' . $row['id'] . ')">
								<i class="glyphicon glyphicon-ok"></i>
							</a>
							<a href="#" onclick="closeTask(' . $row['id'] . ')">
								<i class="glyphicon glyphicon-remove"></i>
							</a>
						</div>
					</td>
				</tr>
			';
		}
	}
	else
	{
		$str = '
			<tr>
				<td>Нет данных!</td>
			</tr>
		';
	}

	return $str;
}

/**
 * Добавление задачи
 * @param integer $event_id идентификатор события
 * @param string $name название
 */
function addTask($event_id, $name)
{
	$name	 = trim($name);
	$query	 = mysql_query("INSERT INTO `tasks` (event_id, name) VALUE ('$event_id', '$name')");
}

/**
 * Редактирование задачи
 * @param integer $id идентификатор
 * @param string $name название
 */
function editTask($id, $name)
{
	$name	 = trim($name);
	mysql_query("UPDATE `tasks` SET `name` = '$name' WHERE id = '$id'");
}

/**
 * Удаление задачи
 * @param integer $id идентификатор
 */
function deleteTask($id)
{
	$query = mysql_query("DELETE FROM `tasks` WHERE id = '$id'");
}

/**
 * Установка уведомления
 * @param string $type тип
 * @param string $message сообщение
 * @return array
 */
function setAlert($type, $message)
{
	$alert				 = array();
	$alert['type']		 = $type;
	$alert['message']	 = $message;

	return $alert;
}
?>
