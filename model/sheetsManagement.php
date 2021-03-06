<?php
class sheetsManagement extends manager
{
  //Function that retrieves all the sheets in BD
  public function getAllSheets()
  {
    $query = $this->_db->query("SELECT * FROM sheets");
    $result = $query->fetchall(PDO::FETCH_CLASS, "sheet");
    $query->closeCursor();
    return $result;
  }

  //Function that retrieves a single sheet of the DB based on its ID
  public function getSheet(int $id)
  {
    $query = $this->_db->prepare("SELECT * FROM sheets WHERE id = ?");
    $query->execute([$id]);
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return new sheet($result);
  }

  //Function that add a sheet in DB
  public function addSheet(sheet $sheet)
  {
    $query = $this->_db->prepare("INSERT INTO sheets (organization, entitled, start, end, monday_morning, monday_afternoon, tuesday_morning, tuesday_afternoon, wednesday_morning, wednesday_afternoon, thursday_morning, thursday_afternoon, friday_morning, friday_afternoon) VALUES (:organization, :entitled, :start, :end, :monday_morning, :monday_afternoon, :tuesday_morning, :tuesday_afternoon, :wednesday_morning, :wednesday_afternoon, :thursday_morning, :thursday_afternoon, :friday_morning, :friday_afternoon)");
    $result = $query->execute([
      "organization" => $sheet->getOrganization(),
      "entitled" => $sheet->getEntitled(),
      "start" => $sheet->getStart(),
      "end" => $sheet->getEnd(),
      "monday_morning" => $sheet->getMondayMorning(),
      "monday_afternoon" => $sheet->getMondayAfternoon(),
      "tuesday_morning" => $sheet->getTuesdayMorning(),
      "tuesday_afternoon" => $sheet->getTuesdayAfternoon(),
      "wednesday_morning" => $sheet->getWednesdayMorning(),
      "wednesday_afternoon" => $sheet->getWednesdayAfternoon(),
      "thursday_morning" => $sheet->getThursdayMorning(),
      "thursday_afternoon" => $sheet->getThursdayAfternoon(),
      "friday_morning" => $sheet->getFridayMorning(),
      "friday_afternoon" => $sheet->getFridayAfternoon()
    ]);
    $query->closeCursor();
    return $result;
  }

  //Function that update a sheet in DB
  public function updateSheet(sheet $sheet)
  {
    $query = $this->_db->prepare("UPDATE sheets SET organization = :organization, entitled = :entitled, start = :start, end = :end, monday_morning = :monday_morning, monday_afternoon = :monday_afternoon, tuesday_morning = :tuesday_morning, tuesday_afternoon = :tuesday_afternoon, wednesday_morning = :wednesday_morning, wednesday_afternoon = :wednesday_afternoon, thursday_morning = :thursday_morning, thursday_afternoon = :thursday_afternoon, friday_morning = :friday_morning, friday_afternoon = :friday_afternoon WHERE id = :id)");
    $result = $query->execute([
      "organization" => $sheet->getOrganization(),
      "entitled" => $sheet->getEntitled(),
      "start" => $sheet->getStart(),
      "end" => $sheet->getEnd(),
      "monday_morning" => $sheet->getMondayMorning(),
      "monday_afternoon" => $sheet->getMondayAfternoon(),
      "tuesday_morning" => $sheet->getTuesdayMorning(),
      "tuesday_afternoon" => $sheet->getTuesdayAfternoon(),
      "wednesday_morning" => $sheet->getWednesdayMorning(),
      "wednesday_afternoon" => $sheet->getWednesdayAfternoon(),
      "thursday_morning" => $sheet->getThursdayMorning(),
      "thursday_afternoon" => $sheet->getThursdayAfternoon(),
      "friday_morning" => $sheet->getFridayMorning(),
      "friday_afternoon" => $sheet->getFridayAfternoon(),
      "id" => $sheet->getId()
    ]);
    $query->closeCursor();
    return $result;
  }
  //Function that delete a sheet in DB
  public function deleteSheet(int $id)
  {
    $query = $this->_db->prepare("DELETE FROM sheets WHERE id = ?");
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $query->execute([$id]);
    $query->closeCursor();
    return $result;
  }



  public function getTeachersByStatus(user $user)
  {
    $query = $this->_db->prepare("SELECT user_id, status, name FROM users WHERE status = :status");
    $result = $query->execute([
      "status" => $user->getStatus("teacher")
      ]);
    $query->closeCursor();
    return $result;
  }
}
?>
